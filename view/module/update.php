<?php
include '../../services/ModuleService.php';
include '../../database/Database.php';
include '../../model/Module.php';


$id = $_GET['id'] ?? null;

use services\ModuleService;

$moduleService = new ModuleService();
$module = $moduleService->getModuleById($id);
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

<h2>Edit Module</h2>

<form action="../../controller/module/UpdateController.php" method="POST">
    <input type="hidden" name="id" value="<?= $module->id ?>">

    <div class="mb-3">
        <label class="form-label">Module Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($module->name) ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
