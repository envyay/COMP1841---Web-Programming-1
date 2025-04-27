<?php
include '../../services/PostService.php';
include '../../database/Database.php';
include '../../model/Post.php';


$id = $_GET['id'] ?? null;

use services\PostService;

$postService = new PostService();
$post = $postService->getPostById($id);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-4">

<h2>Edit Post</h2>

<form action="../../controller/post/UpdateController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $post->id ?>">
    <input type="hidden" name="userId" id="localStorageUserId">

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($post->title) ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <input type="text" name="content" value="<?= htmlspecialchars($post->content) ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="picture" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

<?php if (!empty($post->picture)): ?>
<form action="../../controller/post/DeleteImageController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $post->id ?>">
    <div class="text-center mb-3">
        <label class="form-label">Would you like to delete this image?</label>
        <button type="submit" class="btn btn-danger">Yes</button><br>
        <img src="../../uploads/<?= $post->picture ?>"
             alt="Image" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
    </div>
</form>
<?php endif; ?>

<script>

    document.getElementById('localStorageUserId').value = localStorage.getItem("userId");
</script>
</body>
</html>