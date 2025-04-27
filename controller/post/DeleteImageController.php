<?php
include '../../model/Post.php';
include '../../services/PostService.php';
include '../../database/Database.php';

use services\PostService;

$id = (int)$_POST['id'] ?? 0;

$postService = new PostService();
$response = $postService->deleteImage($id);

header("Location: /student_so/view/post/update.php?id=$id");
exit();
