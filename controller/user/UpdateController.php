<?php
include '../../model/User.php';
include '../../services/UserService.php';
include '../../database/Database.php';

use model\User;
use services\UserService;

$id = $_POST['id'] ?? null;
$fullName = $_POST['fullName'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$avatar = $_POST['avatar'] ?? "";
$class = $_POST['class'] ?? "";
$role = $_POST['role'] ?? "";


$user = new User();
$user = $user->init($id, $fullName, $email, $password, $avatar, $class, $role);

$userService = new UserService();
$response = $userService->updateUser($user);

header("Location: /student_so/view/user/index.php");
exit();