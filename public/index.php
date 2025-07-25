<?php
session_start();

require __DIR__ . "/../View/header.php";

require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Controller/UserController.php";
require_once __DIR__ . "/../Controller/ArticleController.php";

use App\Controllers\UserController;
use App\Controllers\ArticleController;
use App\Config\Database;

$db = (new Database())->getConnection();

$userController = new UserController($db);
$articleController = new ArticleController($db);

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'register':
        $userController->register();
        break;

    case 'login':
        $userController->connection();
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit;

    case 'createArticle':
        $articleController->createArticle();
        break;

    case 'unArticle':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id) {
            $articleController->show($id);
        } else {
            $_SESSION['error'] = "Article invalide.";
            header('Location: index.php');
            exit;
        }
        break;

    case 'home':
    default:
        $articleController->listArticles();
        break;
}

require __DIR__ . "/../View/footer.php";





