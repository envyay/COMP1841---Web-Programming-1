<?php
$action = $_GET['action'] ?? "";
if ($action == "logout") {
    $_SESSION = [];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script>
    let action = '<?= $action ?>'
    if (action === "logout") {
        localStorage.clear()
    }

</script>
</head>

<body class="container mt-5">

<h2 class="text-center">Student Stack Overflow</h2>

<form action="../../controller/login/AuthController.php" method="POST">
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>

</body>
</html>