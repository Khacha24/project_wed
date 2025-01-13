<?php
// เชื่อมต่อกับฐานข้อมูล MySQL (โดยใช้ 'root' เป็นชื่อผู้ใช้และไม่มีรหัสผ่าน)
$conn = mysqli_connect("localhost", "root", "", "backticks");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

// รับค่าจากฟอร์ม
$location_name = $_POST['location_name'];
$details = $_POST['details'];
$img = $_FILES['img'];
$address = $_POST['address'];
$province_id = $_POST['province_id'];
$type_id = $_POST['type_id'];

// ตรวจสอบข้อมูลที่จำเป็น
if (empty($location_name) || empty($details) || empty($address) || empty($province_id) || empty($type_id) || empty($_FILES['img']['tmp_name'])) {
     die("กรุณากรอกข้อมูลให้ครบถ้วน!");
}

// ตรวจสอบการอัปโหลดไฟล์รูปภาพ
$target_dir = "./img/"; // โฟลเดอร์สำหรับเก็บรูปภาพ
$target_file = $target_dir . basename($_FILES['img']['name']);

// ตรวจสอบว่าไฟล์ถูกอัปโหลดสำเร็จหรือไม่
if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
     die("เกิดข้อผิดพลาดในการอัปโหลดไฟล์.");
}

// เพิ่มข้อมูลในตาราง `location_all`
$sql_locations = "INSERT INTO location_all (location_name, details, img, address, province_id, type_id) 
                  VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_locations);
$stmt->bind_param("ssssii", $location_name, $details, $target_file, $address, $province_id, $type_id);

// รันคำสั่ง SQL
if ($stmt->execute()) {
     echo " <script>
     alert('บันทึกข้อมูลเรียบร้อย');
</script>";
     echo "<script>
     window.location = 'data_ui.php';
</script>";
} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     echo "<script>
     alert('บันทึกข้อมูลไม่สำเร็จ');
</script>";
}
$stmt->close();

// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
