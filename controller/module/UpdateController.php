<?php
include '../../model/Module.php';
include '../../services/ModuleService.php';
include '../../database/Database.php';

use model\Module;
use services\ModuleService;

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? "";


$module = new Module();
$module = $module->init($id, $name);

$moduleService = new ModuleService();
$response = $moduleService->updateModule($module);

header("Location: /student_so/view/module/index.php");
exit();