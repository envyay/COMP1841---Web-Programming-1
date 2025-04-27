<?php

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Module</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-4">

<h2>Add Module</h2>

<form action="../../controller/module/AddController.php" method="POST">
    <input type="hidden" name="id">

    <div class="mb-3">
        <label class="form-label">Module Name</label>
        <input type="text" name="name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>

    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
