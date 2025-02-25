<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backticks";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$id_zone = isset($_POST['id_zone']) ? $_POST['id_zone'] : '';

if (!empty($id_zone)) {
     $sql = "SELECT * FROM province WHERE zone_id = '$id_zone'";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
          // ส่งข้อมูลจังหวัดให้กับฝั่ง frontend
          echo '<option value="">-- เลือกจังหวัด --</option>'; // ตัวเลือกเริ่มต้น
          while ($row = $result->fetch_assoc()) {
               echo '<option value="' . $row['province_id'] . '">' . $row['name_province'] . '</option>';
          }
     } else {
          echo '<option value="">ไม่มีข้อมูลจังหวัด</option>';
     }
} else {
     echo '<option value="">เลือกภาคก่อน</option>';
}

$conn->close();
