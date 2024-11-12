<?php
include 'connectdb.php';
$name = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

$password = hash('sha512', $password);

// ตรวจเบอร์มีมั้ย
$sql_check = "SELECT * FROM member WHERE telephone = '$phone'";
$result_check = mysqli_query($conn, $sql_check);

// ถ้ามีข้อมูลเบอร์ในระบบแล้ว
if (mysqli_num_rows($result_check) > 0) {
    echo "<script> alert('เบอร์โทรศัพท์นี้ได้ถูกใช้สมัครแล้ว'); </script>";
    echo "<script> window.location = 'register.php';</script>";
} else {
    // ถ้าไม่มีเบอร์โทรนี้อยู่ในระบบ ให้เพิ่มข้อมูลใหม่
    $sql = "INSERT INTO member (name, lastname, telephone, username, password)
            VALUES ('$name', '$lastname', '$phone', '$username', '$password')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo " <script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
        echo "<script> window.location = 'login.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
    }
}

mysqli_close($conn);
