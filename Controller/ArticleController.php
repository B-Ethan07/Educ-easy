<?php

namespace App\Controllers;

require_once __DIR__ . '/../Model/Article.php';
require_once __DIR__ . '/../Model/Comment.php';
require_once __DIR__ . '/../Model/Comment.php';

use App\Model\Article;
use App\Models\Comment;
use PDO;

class ArticleController
{
    private Article $articleModel;
    private Comment $commentModel;

    public function __construct(PDO $db)
    {
        $this->articleModel = new Article($db);
        $this->commentModel = new Comment($db);
    }

    /**
     * Crée un article/story
     */
    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $title   = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $theme   = $_POST['theme'] ?? '';
            $imagePath = null;

            // Gérer l'upload de l'image
            if (!empty($_FILES['image']['name'])) {
                $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/articles/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $uniqueName = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetPath = $uploadDir . $uniqueName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                    $imagePath = 'uploads/articles/' . $uniqueName;
                } else {
                    $_SESSION['error'] = "Échec de l'upload de l'image.";
                    require __DIR__ . '/../View/Article/createArticle.php';
                    return;
                }
            }

            $userId = $_SESSION['user']['id'] ?? null;

            if (!$userId) {
                $_SESSION['error'] = "Utilisateur non connecté.";
                header('Location: index.php?action=login');
                exit;
            }

            $success = $this->articleModel->createStory($title, $content, $theme, $imagePath, (int)$userId);

            if ($success) {
                $_SESSION['success'] = "Article publié avec succès.";
                header('Location: index.php?action=article');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de la publication.";
            }
        }

        // Formulaire de création d'article
        require __DIR__ . '/../View/Article/createArticle.php';
    }

    /**
     * Affiche tous les articles avec leur auteur
     */
    public function listArticles()
    {
        $articles = $this->articleModel->getAllWithUser();
        require __DIR__ . '/../View/Article/home.php';
    }

    /**
     * Affiche un seul article par ID + ses commentaires
     */
    public function show($id)
    {
        if (!$id || !is_numeric($id)) {
            $_SESSION['error'] = "ID invalide.";
            header("Location: index.php?action=home");
            exit;
        }

        $article = $this->articleModel->showStory((int)$id);

        if (!$article) {
            $_SESSION['error'] = "Article non trouvé.";
            header("Location: index.php?action=home");
            exit;
        }

        // Gérer l'ajout de commentaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
            $userId = $_SESSION['user']['id'] ?? null;
            $content = trim($_POST['content'] ?? '');

            if ($userId && !empty($content)) {
                $this->commentModel->addComment((int)$id, $userId, $content);
                header("Location: index.php?action=un_article&id=" . $id);
                exit;
            }
        }

        $comments = $this->commentModel->getCommentsByArticleId((int)$id);

        require __DIR__ . '/../View/Article/unArticle.php';
    }

}
