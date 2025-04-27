<?php
include '../../services/PostService.php';
include '../../model/Post.php';
include '../../database/Database.php';

use model\Post;
use services\PostService;

$studentId = (int) $_POST['userId'];
$title = $_POST['title'] ?? "";
$createdAt = new DateTime();
$updatedAt = new DateTime();
$content = $_POST['content'] ?? "";
$likes = 0;
$moduleId = (int) $_POST['moduleId'];

$picture = '';

if(isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
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

    if(move_uploaded_file($fileTmpPath, $destPath)) {
        $picture = $fileNameClean;
    }
}

$postService = new PostService();
$post = new Post();
$post = $post->init(null, $studentId, $title, $createdAt, $updatedAt, $content, $likes, $moduleId, $picture);

$response = $postService->insertPost($post);


header("Location: /student_so/view/post/index.php");
exit();
?>
