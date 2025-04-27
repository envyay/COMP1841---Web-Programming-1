<?php
session_start();

include '../../constant/Role.php';

use constant\Role;

$role = (int) $_SESSION['role'];

if ($role == Role::ADMIN) {
    echo "<script>window.location.href='../../view/module/index.php';</script>";
} else {
    echo "<script>alert('⛔You do not have permission to join this page!'); window.location.href='../../view/post/index.php'</script>";
}
