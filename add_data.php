<?php
// เชื่อมต่อกับฐานข้อมูล MySQL (โดยใช้ 'root' เป็นชื่อผู้ใช้และไม่มีรหัสผ่าน)
$conn = mysqli_connect("localhost", "root", "", "databases");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

// ตรวจสอบค่าที่ส่งมาจากฟอร์ม
$name_zone = isset($_POST['name_zone']) ? $_POST['name_zone'] : '';
$name_province = isset($_POST['name_province']) ? $_POST['name_province'] : '';

// คำสั่ง SQL
$sql = "INSERT INTO data (`name_zone`, `name_province`) VALUES ('$name_zone', '$name_province')";

// รันคำสั่ง SQL
$result = mysqli_query($conn, $sql);

// ตรวจสอบผลลัพธ์
if ($result) {
     echo " <script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
     echo "<script> window.location = 'add_data.php';</script>";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     echo "<script> alert('บันทึกข้อมูลไม่สำเร็จ'); </script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
