<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validation
    if (empty($username) || strlen($username) > 50) {
        $errors[] = "Le pseudo est obligatoire et doit faire moins de 50 caractères.";
    }

    if (empty($password) || strlen($password) > 50) {
        $errors[] = "Le mot de passe est obligatoire et doit faire moins de 50 caractères.";
    }

    if (empty($errors)) {
        require 'config.php';
        $pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // requête SQL
        $stmt = $pdo->prepare("INSERT INTO users (username, password)
                               VALUES (:username, :password)");

        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit;
        } else {
            $errors[] = "Erreur lors de l'insertion en base.";
        }
    }

    // Affichage des erreurs
    foreach ($errors as $e) {
        echo "<p style='color:red'>" . htmlentities($e) . "</p>";
    }
}
?>