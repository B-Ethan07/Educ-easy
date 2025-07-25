<?php
namespace App\Models;

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCommentsByArticleId($articleId) {
        $stmt = $this->db->prepare("SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at DESC");
        $stmt->execute(['article_id' => $articleId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addComment($articleId, $userId, $content) {
        $stmt = $this->db->prepare("INSERT INTO comments (article_id, user_id, content, created_at) VALUES (:article_id, :user_id, :content, NOW())");
        return $stmt->execute([
            'article_id' => $articleId,
            'user_id' => $userId,
            'content' => $content,
        ]);
    }
}
