<?php
include 'con_admin.php';
session_start();
$password = $_POST['password'];
$password_check = $_POST['password2'];

if ($password === $password_check) {
     $password = hash('sha512', $password);
} else {
     $_SESSION["Error_password"] = "<p>รหัสผ่านไม่ตรงกัน</p>";
     header("Location: reset_password.php");
     exit;
}
