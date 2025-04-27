<?php

include '../../model/Post.php';
include '../../services/PostService.php';
include '../../database/Database.php';

use model\Post;
use services\PostService;

$action = $_POST['action'] ?? "";
$id = (int)$_POST['id'] ?? 0;
$studentId = (int)$_POST['userId'];
$title = $_POST['title'] ?? "";
$content = $_POST['content'] ?? "";
$updatedAt = new DateTime();
$likes = 0;


$picture = "";
if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['picture']['tmp_name'];
    $fileName = $_FILES['picture']['name'];
    $fileSize = $_FILES['picture']['size'];
    $fileType = $_FILES['picture']['type'];

    $fileNameClean = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $fileName);

    $uploadDir = '../../uploads/';
    $destPath = $uploadDir . $fileNameClean;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($fileTmpPath, $destPath)) {
        $picture = $fileNameClean;
    }
}


$post = new Post();
$post = $post->init($id, $studentId, $title, null, $updatedAt, $content, $likes, null, $picture);
$postService = new PostService();
$response = $postService->updatePost($post);

header("Location: /student_so/view/post/index.php");
exit();
