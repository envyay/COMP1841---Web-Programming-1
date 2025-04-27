<?php
include '../../services/UserService.php';
include '../../database/Database.php';
include '../../model/User.php';


$id = $_GET['id'] ?? null;

use services\UserService;

$userService = new UserService();
$user = $userService->getUserById($id);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Edit User</h2>

<form action="../../controller/user/UpdateController.php" method="POST">
    <input type="hidden" name="id" value="<?= $user->id ?>">

    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="fullName" value="<?= htmlspecialchars($user->fullName) ?>" class="form-control">
        <label class="form-label">Email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($user->email) ?>" class="form-control">
        <label class="form-label">Password</label>
        <input type="text" name="password" value="<?= htmlspecialchars($user->password) ?>" class="form-control">
        <label class="form-label">Class</label>
        <input type="text" name="class" value="<?= htmlspecialchars($user->class) ?>" class="form-control">
        <label class="form-label">Role</label>
        <input type="text" name="role" value="<?= htmlspecialchars($user->role) ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>