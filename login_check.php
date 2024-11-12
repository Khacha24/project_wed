<?php 
include 'connectdb.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$password = hash('sha512', $password);

//เช็คข้อมูลผู้ใช้
$sql = "SELECT * FROM member WHERE username = '$username' and password = '$password' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($row) {  // ตรวจสอบในฐานข้อมูล
    $_SESSION["username"] = $row['username'];
    $_SESSION["pw"] = $row['password'];
    $_SESSION["firstname"] = $row['name'];
    $_SESSION["lastname"] = $row['lastname'];
    
    header("Location: index.php");
    exit;
} else {
    $_SESSION["Error"] = "<p>username หรือ password ไม่ถูกต้อง</p>";
    header("Location: login.php");
    exit;
}
?>
