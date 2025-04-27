<?php


namespace services;

use database\Database;
use model\Question;
use PDO;

class QuestionService
{
    private PDO $pdo;
    private string $tableName = "Question";

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    public function getQuestionsById(int $id): ?array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE postId = :postId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":postId", $id, PDO::PARAM_INT);

        $stmt->execute();
        $rows = $stmt->fetchAll();
        $questions = array_map(function ($row) {
            $question = new Question();
            return $question->mapFromRow($row);
        }, $rows);
        return $questions;

    }

    public function insertQuestion(Question $question): bool
    {
        $sql = "INSERT INTO {$this->tableName} (parentId, studentId, postId, content, likes) VALUES (:parentId, :studentId, :postId,:content, :likes)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':parentId', $question->parentId);
        $stmt->bindParam(':studentId', $question->studentId);
        $stmt->bindParam(':postId', $question->postId);
        $stmt->bindParam(':content', $question->content);
        $stmt->bindParam(':likes', $question->likes);

        return $stmt->execute();
    }
}
