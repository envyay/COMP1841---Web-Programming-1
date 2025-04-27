<?php

include '../../services/UserService.php';
include '../../database/Database.php';
include '../../model/User.php';

use services\UserService;

$userService = new UserService();
$users = $userService->getAllUser();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<?php include '../header/header.php'; ?>
<h2>Users List</h2>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Class</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= htmlspecialchars($user->fullName) ?></td>
            <td><?= htmlspecialchars($user->email) ?></td>
            <td><?= htmlspecialchars($user->password) ?></td>
            <td><?= htmlspecialchars($user->class) ?></td>
            <td><?= htmlspecialchars($user->role) ?></td>
            
            <td>
                <a href="update.php?id=<?= $user->id ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="../../controller/user/DeleteController.php?id=<?= $user->id ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="add.php" class="btn btn-success">Add User</a>

</body>
</html>
