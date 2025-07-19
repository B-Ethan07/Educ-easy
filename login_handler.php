<?php
session_start(); // OBLIGATOIRE pour utiliser $_SESSION

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (empty($username) || strlen($username) > 50) {
        $errors[] = "Le pseudo est obligatoire et doit être inférieur à 50 caractères.";
    }
    if (empty($password) || strlen($password) > 50) {
        $errors[] = "Le mot de passe est obligatoire et doit être inférieur à 50 caractères.";
    }

    if (empty($errors)) {
        require 'config.php';

        try {
            $pdo = new PDO(DSN, USER, PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

            // Recherche si l'utilisateur existe dans la DB
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                // Connexion réussie à la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('Location: index.php');
                exit;
            } else {
                $errors[] = "Nom d'utilisateur ou mot de passe incorrect.";
            }

        } catch (PDOException $e) {
            $errors[] = "Erreur de base de données : " . $e->getMessage();
        }
    }
}

// Affichage des erreurs (à inclure dans ton HTML plus bas si tu veux)
foreach ($errors as $e) {
    echo "<p style='color:red'>" . htmlentities($e) . "</p>";
}
?>