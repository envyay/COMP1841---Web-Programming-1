<?php

namespace model;

use DateTime;

class Question
{
    public ?int $id;
    public ?int $parentId;
    public int $studentId;
    public ?int $postId;
    public ?DateTime $createdAt;
    public ?DateTime $updatedAt;
    public string $content;
    public ?int $likes;



    public function __construct() {}

    public function init(?int $id, ?int $parentId, int $studentId, int $postId, DateTime $createdAt, DateTime $updatedAt, string $content, int $likes) : Question {
        $this->id = $id;
        $this->parentId = $parentId;
        $this->studentId = $studentId;
        $this->postId = $postId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->content = $content;
        $this->likes = $likes;
        return $this;
    }

    public function mapFromRow(mixed $row): Question {
        $this->id = $row["id"];
        $this->parentId = $row["parentId"];
        $this->studentId = $row["studentId"];
        $this->postId = $row["postId"];

        $createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["createdAt"]);
        if ($createdAt) {
            $this->createdAt = $createdAt;
        }
        $updatedAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["updatedAt"]);
        if ($updatedAt) {
            $this->updatedAt = $updatedAt;
        }
        $this->content = $row["content"];
        $this->likes = $row["likes"];
        return $this;
    }
}