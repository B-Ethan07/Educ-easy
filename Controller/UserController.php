<?php

namespace App\Controllers;

require_once __DIR__ . '/../Model/User.php';

use App\Model\User;
use PDO;

class UserController
{
    private User $user;

    public function __construct(PDO $db)
    {
        $this->user = new User($db);
    }

    /**
     * Inscription d’un nouvel utilisateur
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $username = trim($_POST['username'] ?? '');
            $email    = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            // Vérifie que les champs sont remplis
            if (empty($username) || empty($email) || empty($password)) {
                $_SESSION['error'] = "Tous les champs sont requis.";
                require __DIR__ . '/../View/user/register.php';
                return;
            }

            // Vérifie que l’email n’existe pas déjà
            if ($this->user->findByEmail($email)) {
                $_SESSION['error'] = "Cet email est déjà utilisé.";
                require __DIR__ . '/../View/user/register.php';
                return;
            }

            // Crée l’utilisateur
            $this->user->create($username, $email, $password);

            $_SESSION['success'] = "Compte créé avec succès. Connectez-vous.";
            header('Location: index.php?action=login');
            exit;
        }

        // Affiche le formulaire d'inscription
        require __DIR__ . '/../View/user/register.php';
    }

    /**
     * Connexion utilisateur
     */
    public function connection()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $_SESSION['error'] = "Email et mot de passe requis.";
                require __DIR__ . '/../View/user/login.php';
                return;
            }

            $user = $this->user->login($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['success'] = "Bienvenue, " . htmlspecialchars($user['username']) . " !";
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error'] = "Email ou mot de passe invalide.";
                require __DIR__ . '/../View/user/login.php';
                return;
            }
        }

        // Affiche le formulaire de login
        require __DIR__ . '/../View/user/login.php';
    }
}
