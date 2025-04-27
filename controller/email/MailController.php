<?php
include '../../database/Database.php';
include '../../services/MailService.php';
include '../../services/UserService.php';
include '../../model/User.php';

use services\MailService;
use services\UserService;

$title = $_POST['subject'];
$content = $_POST['body'];

$userService = new UserService();
$admins = $userService->getAllAdmins();


foreach ($admins as $admin) {
    $mailService = new MailService();
    $mailService->sendEmail($title, $content, $admin->email, $admin->fullName);

}
header('Location: ../../view/post/index.php?action=alert');
exit();
?>
