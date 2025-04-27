<?php
session_start();

use services\UserService;

include '../../database/Database.php';
include '../../services/UserService.php';
include '../../model/Login.php';
include '../../model/User.php';

$email = $_POST['email'] ?? "";
$password = $_POST['password'] ?? "";

$loginService = new UserService();

$user = $loginService->login($email, $password);
if ($user) {
    $_SESSION['logged'] = true;
    $_SESSION['role'] = $user->role;
    $_SESSION['userId'] = $user->id;
}
?>

<script>
    const user = <?= json_encode($user) ?>;
    console.log(user)
    if (!user) {
        localStorage.setItem("logged", false);
        localStorage.setItem("userId", null);
        localStorage.setItem("role", null);
        alert("password or email is incorrect")
        window.location.href = "../../view/login/index.php";
    } else {
        localStorage.setItem("logged", true);
        localStorage.setItem("userId", user.id);
        localStorage.setItem("role", user.role);
        window.location.href = "../../view/post/index.php";
    }
</script>