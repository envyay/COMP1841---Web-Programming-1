<?php
session_start();

include '../../services/PostService.php';

include '../../database/Database.php';
include '../../model/Post.php';
include '../../constant/Role.php';

use services\PostService;
use constant\Role;

$id = (int) $_GET['id'] ?? null;
$postService = new PostService();
$role = (int) $_SESSION['role'];
$userId =(int) $_SESSION['userId'];

$post = $postService->getPostById($id);

$studentId = $post->studentId;


if ($role == Role::ADMIN) {
    $post = $postService->deletePost($id);
    echo "<script>alert('✅ Deleted Successfully!'); window.location.href='../../view/post/index.php';</script>";
} else if ($role == Role::STUDENT && $userId == $studentId) {
    $post = $postService->deletePost($id);
    echo "<script>alert('✅ Deleted Successfully!'); window.location.href='../../view/post/index.php';</script>";
} else {
    echo "<script>alert('⛔ You do not have permission to delete this post.'); window.location.href='../../view/post/index.php';</script>";
}
?>
