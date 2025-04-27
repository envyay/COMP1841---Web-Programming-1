<?php

namespace services;



use database\Database;
use PDO;
use model\Post;

class PostService
{
    private PDO $pdo;
    private string $tableName = "Post";

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function getAllPost(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $posts = array_map(function ($row) {
            $post = new Post();
            return $post->mapFromRow($row);
        }, $rows);
        return $posts;
    }

    public function getPostById(int $id): Post{
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        $stmt->execute();
        $row = $stmt->fetch();

        $post = new Post();
        return $post->mapFromRow($row);
    }

    public function insertPost(Post $post): bool
    {
        $sql = "INSERT INTO {$this->tableName} (studentId, title, content, likes, moduleId, picture) VALUES (:studentId, :title, :content, :likes, :moduleId, :picture)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':studentId', $post->studentId);
        $stmt->bindParam(':title', $post->title);
        $stmt->bindParam(':content', $post->content);
        $stmt->bindParam(':likes', $post->likes);
        $stmt->bindParam(':moduleId', $post->moduleId);
        $stmt->bindParam(':picture', $post->picture);
        return $stmt->execute();
    }

    public function deletePost(int $id): bool {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function updatePost(Post $post): bool {
        $updatedAt = $post->updatedAt->format('Y-m-d H:i:s');
        if($post->picture === "") {
            $sql = "UPDATE {$this->tableName} SET title = :title, content = :content, updatedAt = :updatedAt WHERE id = :id";
        } else {
            $sql = "UPDATE {$this->tableName} SET title = :title, content = :content, updatedAt = :updatedAt, picture = :picture WHERE id = :id";
        }
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':id', $post->id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $post->title);
        $stmt->bindParam(':content', $post->content);
        $stmt->bindParam(':updatedAt',$updatedAt);
        if($post->picture !== "") {
            $stmt->bindParam(':picture', $post->picture);
        }

        return $stmt->execute();
    }

    public function deleteImage(int $id): bool {
        $sql = "UPDATE {$this->tableName} SET picture = :picture WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':picture', $picture);
        return $stmt->execute();
    }
}

