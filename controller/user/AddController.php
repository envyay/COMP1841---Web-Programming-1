<?php
include '../../services/UserService.php';
include '../../model/User.php';
include '../../database/Database.php';

use model\User;
use services\UserService;

$fullName = $_POST['fullName'] ?? "";
$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";
$avatar = $_POST['avatar'] ?? "";
$class = $_POST['class'] ?? "";
$role = $_POST['role'] ?? "";

$userService = new UserService();
$user = new User();
$user = $user->init(null,$fullName, $email, $password, $avatar, $class, $role);


$response = $userService->insertUser($user);


header("Location: /student_so/view/user/index.php");
exit();
?>