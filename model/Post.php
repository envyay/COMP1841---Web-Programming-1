<?php

namespace model;

use AllowDynamicProperties;
use DateTime;

#[AllowDynamicProperties] class Post
{
    public ?int $id;
    public ?int $studentId;
    public ?string $title;
    public ?DateTime $createdAt;
    public DateTime $updatedAt;
    public ?string $content;
    public ?int $likes;
    public ?int $moduleId;
    public ?string $picture;

    public function __construct(){}

    public function init(?int $id, ?int $studentId, ?string $title, ?DateTime $createdAt, DateTime $updatedAt ,?string $content, ?int $likes, ?int $moduleId, ?string $picture): Post
    {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->title = $title;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->content = $content;
        $this->likes = $likes;
        $this->moduleId = $moduleId;
        $this->picture = $picture;
        return $this;
    }

    public function mapFromRow(mixed $row): Post {
        $this->id = $row["id"];
        $this->studentId = $row["studentId"];
        $this->title = $row["title"];
        $this->createdAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["createdAt"]);
        $this->updatedAt = DateTime::createFromFormat('Y-m-d H:i:s', $row["updatedAt"]);
        $this->content = $row["content"];
        $this->likes = $row["likes"];
        $this->moduleId = $row["moduleId"];
        $this->picture = $row["picture"];
        return $this;
    }
}