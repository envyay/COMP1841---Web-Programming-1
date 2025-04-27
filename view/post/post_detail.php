<?php
include "../../services/PostService.php";
include "../../services/ModuleService.php";
include "../../model/Module.php";
include "../../database/Database.php";
include '../../model/Post.php';
include '../../services/QuestionService.php';
include '../../model/Question.php';
include '../../services/UserService.php';
include '../../model/User.php';

use services\ModuleService;
use services\PostService;
use services\QuestionService;
use services\UserService;



$id = (int)$_GET['id'] ?? null;

$questionService = new QuestionService();
$questions = $questionService->getQuestionsById($id);

$postService = new PostService();
$post = $postService->getPostById($id);

$userService = new UserService();
$user = $userService->getUserById($post->studentId);

$users = $userService->getAllUser();

function GetUserNameById(array $users, int $id): string {
    $user = array_filter($users, fn($user) => $user->id == $id);
    return reset($user) !== null ? reset($user)->fullName : 'Not found';
}


$moduleService = new ModuleService();
$modules = $moduleService->getAllModules();

$moduleName = getModuleNameById($modules, $post->moduleId);

function GetModuleNameById(array $modules, int $moduleId): string
{
    $module = array_filter($modules, fn($module) => $module->id == $moduleId);
    return reset($module) !== null ? reset($module)->name : 'Not found';
}



?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($moduleName) ?> - Post detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Post Detail</a>
        <a class="btn btn-outline-light" href="../index.php">⬅ Back</a>
    </div>
</nav>

<div class="container">
    <div class="card shadow mb-5">
        <div class="card-body">
            <h1 class="card-module"><?= htmlspecialchars($moduleName) ?></h1>
            <h2 class="card-title"><?= htmlspecialchars($post->title)?></h2>

            <p class="text-muted">
                Author: <strong><?= htmlspecialchars($user->fullName) ?></strong> |
                Created At: <?= $post->createdAt->format('Y-m-d H:i:s') ?> |
                Updated At: <?= $post->updatedAt->format('Y-m-d H:i:s') ?>
            </p>
            <hr>
            <div class="card-text mb-3">
                <?= nl2br(htmlspecialchars($post->content)) ?>
            </div>

            <?php if (!empty($post->picture)): ?>
                <div class="text-center mb-3">
                    <img src="../../uploads/<?=$post->picture?>"
                         alt="Image" class="img-fluid rounded shadow-sm" style="max-height: 400px;">
                </div>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">💬 Question (<?= count($questions) ?>)</h5>
                </div>
                <div class="card-body">
                    <?php if (empty($questions)): ?>
                        <p class="text-muted">No comments yet.</p>
                    <?php else: ?>
                        <?php foreach ($questions as $question): ?>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <small class="text-muted"><?= $post->createdAt->format('Y-m-d H:i:s') ?></small>
                                </div>
                                <strong><?= htmlspecialchars(GetUserNameById($users, $question->studentId)) ?></strong>
                                <p class="mb-1"><?= nl2br(htmlspecialchars($question->content)) ?></p>
                                <hr>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">✍️ Add comment</h5>
                </div>
                <div class="card-body">
                    <form action="../../controller/question/AddController.php" method="POST">
                        <input type="hidden" name="userId" id="localStorageStudentId" ">
                        <input type="hidden" name="postId" value="<?= $post->id ?? 0 ?>">

                        <div class="mb-3">
                            <label for="commentContent" class="form-label">Comment content</label>
                            <textarea class="form-control" id="questionContent" name="content" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Send comment</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
<script>

    document.getElementById('localStorageStudentId').value = localStorage.getItem("userId");
</script>
</body>
</html>