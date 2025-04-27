<?php

include '../../services/ModuleService.php';
include '../../database/Database.php';

use services\ModuleService;

$id = $_GET['id'] ?? null;


$moduleService = new ModuleService();
$module = $moduleService->deleteModule($id);

header("Location: /student_so/view/module/index.php");
exit();
?>
