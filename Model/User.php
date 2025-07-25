<?php

namespace App\Model;

use PDO;

class User
{
    private PDO $connect;

    public function __construct(PDO $db)
    {
        $this->connect = $db;
    }

    /**
     * Crée un nouvel utilisateur avec nom d'utilisateur, email et mot de passe hashé
     */
    public function create(string $username, string $email, string $password): bool
    {
        $sql = "INSERT INTO users (username, email, password) 
                VALUES (:username, :email, :password)";

        $stmt = $this->connect->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':email'    => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    /**
     * Recherche un utilisateur par son email
     */
    public function findByEmail(string $email): array|false
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Authentifie un utilisateur via email et mot de passe
     */
    public function login(string $email, string $password): array|false
    {
        $user = $this->findByEmail($email);

        if (!$user || !isset($user['password'])) {
            return false;
        }

        if (password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
