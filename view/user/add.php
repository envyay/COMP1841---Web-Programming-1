<?php

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

<h2>Add User</h2>

<form action="../../controller/user/AddController.php" method="POST">
    <input type="hidden" name="id">

    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="fullName" class="form-control">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
        <label class="form-label">Password</label>
        <input type="text" name="password" class="form-control">
        <label class="form-label">Class</label>
        <input type="text" name="class" class="form-control">
        <label class="form-label">Role</label>
        <input type="text" name="role" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>