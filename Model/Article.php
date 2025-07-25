<?php

namespace App\Model;

use PDO;

class Article
{
    private PDO $connect;

    public function __construct(PDO $db)
    {
        $this->connect = $db;
    }

    /**
     * Crée un nouvel article/story
     */
    public function createStory(string $title, string $content, string $theme, string $imagePath, int $userId): bool
    {
        $sql = "INSERT INTO story (title, content, theme, image, user_id)
                VALUES (:title, :content, :theme, :image, :user_id)";

        $stmt = $this->connect->prepare($sql);

        return $stmt->execute([
            ':title'    => $title,
            ':content'  => $content,
            ':theme'    => $theme,
            ':image'    => $imagePath,
            ':user_id'  => $userId
        ]);
    }

    /**
     * Récupère toutes les stories avec le nom de l'utilisateur
     */
    public function getAllWithUser(): array
    {
        $sql = "SELECT story.*, users.username
                FROM story
                INNER JOIN users ON story.user_id = users.id
                ORDER BY story.created_at DESC";

        $stmt = $this->connect->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une story par ID
     */
    public function showStory(int $id): ?array
    {
        $sql = "SELECT story.*, users.username
                FROM story
                INNER JOIN users ON story.user_id = users.id
                WHERE story.id = :id";

        $stmt = $this->connect->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
