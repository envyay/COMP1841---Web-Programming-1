<?php

use services\MailService;
use services\ModuleService;
use services\PostService;
use model\Module;

include '../../database/Database.php';
include '../../model/Post.php';
include '../../model/Module.php';
include '../../services/PostService.php';
include '../../services/ModuleService.php';
include '../../services/MailService.php';

$action = $_GET['action'] ?? "";
if ($action == "alert") {
    echo "<script>
alert('Sent email successfully!');
window.location.href = 'index.php';
</script>";
}

$postService = new PostService();
$posts = $postService->getAllPost();

$moduleService = new ModuleService();
$modules = $moduleService->getAllModules();



function getModuleNameById(array $modules, int $moduleId): string
{
    $module = array_filter($modules, fn($module) => $module->id == $moduleId);
    return reset($module) !== null ? reset($module)->name : 'Not found';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-5">

<h2>Posts list</h2>
<a href="post_form.php" class="btn btn-primary mb-3">➕ Post</a>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Module name</th>
        <th>Title</th>
        <th>Content</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= htmlspecialchars(getModuleNameById($modules, $post->moduleId))?></td>
            <td><?= htmlspecialchars($post->title)?></td>
            <td><?= htmlspecialchars(substr($post->content, 0, 50)) ?>...</td>
            <td><?= $post->createdAt->format('Y-m-d H:i:s') ?></td>
            <td><?= $post->updatedAt->format('Y-m-d H:i:s') ?></td>
            <td>
                <a href="update.php?id=<?= $post->id ?>" class="btn btn-warning btn-sm">✏️ Edit</a>
                <a href="../../controller/post/DeleteController.php?id=<?= $post->id ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this post?')">Delete</a>
                <a href="post_detail.php?id=<?= $post->id?>" class="btn btn-primary btn-sm">Details</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
