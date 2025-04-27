<?php

include '../../services/UserService.php';
include '../../database/Database.php';

use services\UserService;

$id = $_GET['id'] ?? null;

$userService = new UserService();
$user = $userService->deleteUser($id);

header("Location: /student_so/view/user/index.php");
exit();
?>