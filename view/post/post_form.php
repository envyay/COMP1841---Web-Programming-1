<?php

use model\Post;
use services\ModuleService;

include '../../model/Post.php';
include '../../model/Module.php';
include '../../services/ModuleService.php';
include '../../database/Database.php';


$postModel = new Post();
$post = null;

if (isset($_GET['id'])) {
    $post = $postModel->getPostById($_GET['id']);
}


$moduleService = new ModuleService();
$modules = $moduleService->getAllModules();

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-5">

<h2>Add Post</h2>

<form action="../../controller/post/AddController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="userId" id="localStorageUserId">
    <input type="hidden" name="id" value="<?= $post['id'] ?? '' ?>">
    <input type="hidden" name="action" value="<?= $post ? 'update' : 'create' ?>">

    <div class="mb-3">
        <label class="form-label">Module name</label>
        <select name="moduleId" id="modules">
            <?php foreach ($modules as $module): ?>
                <option value=<?= $module->id ?>><?= $module->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $post['title'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" required><?= $post['content'] ?? '' ?></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="picture" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-success">💾 Save</button>
</form>
<script>

    document.getElementById('localStorageUserId').value = localStorage.getItem("userId");
</script>
</body>
</html>
