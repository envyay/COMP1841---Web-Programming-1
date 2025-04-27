<?php

include '../../services/ModuleService.php';
include '../../database/Database.php';
include '../../model/Module.php';

use services\ModuleService;

$moduleService = new ModuleService();
$modules = $moduleService->getAllModules();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<?php include '../header/header.php'; ?>
<body class="container mt-4">

<h2>Modules List</h2>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Module Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($modules as $module): ?>
        <tr>
            <td><?= $module->id ?></td>
            <td><?= htmlspecialchars($module->name) ?></td>
            <td>
                <a href="update.php?id=<?= $module->id ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="../../controller/module/DeleteController.php?id=<?= $module->id ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this module?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="add.php" class="btn btn-success">Add Module</a>

</body>
</html>