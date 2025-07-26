<?php

namespace App\Model;
require_once __DIR__ . '/../Config/Mongo.php';

use App\Config\Mongo;

class Comment
{
    private $collection;

    public function __construct()
    {
        $this->collection = Mongo::getCollection('comments');
    }

    public function addComment(array $data): void
    {
        $this->collection->insertOne([
            'article_id'  => $data['article_id'],
            'auteur'     => $data['auteur'],
            'content'    => $data['content'],
            'created_at' => $data['created_at'] ?? new \MongoDB\BSON\UTCDateTime()
        ]);
    }

    public function getCommentsByArticleId($articleId): array
    {
        // article_id est ici un int (ID de l'article MySQL)
        $cursor = $this->collection->find(
            ['article_id' => $articleId],
            ['sort' => ['created_at' => -1]]
        );
        return $cursor->toArray();
    }
}

