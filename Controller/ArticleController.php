<?php

namespace App\Controllers;

require_once __DIR__ . '/../Model/Article.php';
require_once __DIR__ . '/../Model/Comment.php';

use MongoDB\BSON\ObjectId;
use App\Model\Article;
use App\Model\Comment;
use MongoDB\BSON\UTCDateTime;
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
                header('Location: index.php?action=home');
                exit;
            } else {
                $_SESSION['error'] = "Erreur lors de la publication.";
            }
        }

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
    public function show(string $id)
    {
        $article = $this->articleModel->showStory($id);

        if (!$article) {
            $_SESSION['error'] = "Article introuvable.";
            header("Location: index.php?action=home");
            exit;
        }

        $commentModel = new Comment();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
            $auteur = $_SESSION['user']['firstname'] ?? 'Anonyme';
            $content = $_POST['comment_content'] ?? '';

            if (!empty($content)) {
                $commentModel->addComment([
                    'article_id' => $id, // int ici, pas ObjectId
                    'auteur'     => $auteur,
                    'content'    => $content,
                    'created_at' => new UTCDateTime()
                ]);
                header("Location: index.php?action=unArticle&id=$id");
                exit;
            }
        }

        $comments = $commentModel->getCommentsByArticleId($id);

        require_once __DIR__ . '/../View/Article/unArticle.php';
    }

}
