<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
    <a class="navbar-brand" href="">📘 Student Stack Overflow</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="../post/index.php">🏠 Posts list</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../post/post_form.php">➕ Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../controller/module/ManageModuleController.php">📦 Modules</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../email/index.php">📧 Sending Email to Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../controller/user/ManageUserController.php">👤 Manage User</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (!empty($_SESSION['logged'])): ?>

                <li class="nav-item">
                    <a class="nav-link" href="../login/index.php?action=logout">🚪 Log Out</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="../login/index.php">🔐 Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container mt-4">
