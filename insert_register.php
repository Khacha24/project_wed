<?php
include 'con_admin.php';
session_start();
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_check = $_POST['password2'];

$sql_check = "SELECT * FROM user WHERE email = '$email'";
$result_check = mysqli_query($conn, $sql_check);

if ($password === $password_check) {
    $password = hash('sha512', $password);
    // ถ้ามีข้อมูลเบอร์ในระบบแล้ว
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script> alert('เบอร์โทรศัพท์นี้ได้ถูกใช้สมัครแล้ว'); </script>";
        echo "<script> window.location = 'register.php';</script>";
    } else {
        $sql = "INSERT INTO user (name, lastname, email, username, password)
            VALUES ('$name', '$lastname', '$email', '$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo " <script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
            echo "<script> window.location = 'login.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
        }
    }
} else {
    $_SESSION["Error_password"] = "<p>รหัสผ่านไม่ตรงกัน</p>";
    header("Location: register.php");
    exit;
}


mysqli_close($conn);
