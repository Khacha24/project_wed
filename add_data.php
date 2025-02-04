<?php
// เชื่อมต่อกับฐานข้อมูล MySQL
$conn = mysqli_connect("localhost", "root", "", "backticks");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

$location_name = $_POST['location_name'];
$details = $_POST['details'];
$img = $_FILES['img'];
$address = $_POST['address'];
$province_id = $_POST['province_id'];
$type_id = $_POST['type_id'];

if (empty($location_name) || empty($details) || empty($address) || empty($province_id) || empty($type_id) || empty($_FILES['img']['tmp_name'])) {
     echo "<script>
        alert('กรุณากรอกข้อมูลให้ครบถ้วน!');
        window.location = 'data_ui.php';
    </script>";
     exit();
}


$target_dir = "img/data/";
$target_file = $target_dir . basename($_FILES['img']['name']);


$allowed_extensions = ['png', 'jpg'];
$allowed_mime_types = ['image/png', 'image/jpeg'];


$file_extension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
$file_mime_type = mime_content_type($_FILES['img']['tmp_name']);


if (!in_array($file_extension, $allowed_extensions) || !in_array($file_mime_type, $allowed_mime_types)) {
     echo "<script>
        alert('บันทึกข้อมูลไม่สำเร็จ: อนุญาตเฉพาะไฟล์ .png และ .jpg เท่านั้น');
        window.location = 'data_ui.php';
    </script>";
     exit();
}

if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
     echo "<script>
        alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์.');
        window.location = 'data_ui.php';
    </script>";
     exit();
}

$check_sql = "SELECT * FROM location_all WHERE location_name = ? AND address = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ss", $location_name, $address);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
     echo "<script>
        alert('ข้อมูลซ้ำ: มีข้อมูลสถานที่ดังกล่าวมีอยู่ในระบบแล้ว');
        window.location = 'data_ui.php';
    </script>";
     exit();
}


$sql_locations = "INSERT INTO location_all (location_name, details, img, address, province_id, type_id) 
                  VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_locations);
$stmt->bind_param("ssssii", $location_name, $details, $target_file, $address, $province_id, $type_id);

if ($stmt->execute()) {
     echo "<script>
        alert('บันทึกข้อมูลเรียบร้อย');
        window.location = 'data_ui.php';
    </script>";
} else {
     echo "<script>
        alert('บันทึกข้อมูลไม่สำเร็จ: {$stmt->error}');
        window.location = 'data_ui.php';
    </script>";
}

$check_stmt->close();
$stmt->close();
