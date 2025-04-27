<?php
include '../../services/ModuleService.php';
include '../../database/Database.php';

use services\ModuleService;

$name = $_POST['name'] ?? "";

$moduleService = new ModuleService();
$response = $moduleService->insertModule($name);

header("Location: /student_so/view/module/index.php");
exit();
?>