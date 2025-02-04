<?php
session_start();
if (isset($_SESSION["admin"])) {
} else {
     echo " <script> alert('ไม่ได้รับอนุญาต'); </script>";
     echo "<script> window.location = 'index.php';</script>";
}

// เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "", "backticks");

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

// รับค่า location_id จาก URL
if (isset($_GET['location_id']) && !empty($_GET['location_id'])) {
     $location_id = $_GET['location_id'];

     // ดึงข้อมูลจากฐานข้อมูล
     $sql = "SELECT * FROM location_all WHERE location_id = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("i", $location_id);
     $stmt->execute();
     $result = $stmt->get_result();

     // ตรวจสอบว่ามีข้อมูลหรือไม่
     if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
     } else {
          die("ไม่พบข้อมูลที่ต้องการแก้ไข");
     }
} else {
     die("ไม่มี ID ที่ส่งมา");
}

// เมื่อกดปุ่มบันทึกการแก้ไข
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $location_name = $_POST['location_name'];
     $details = $_POST['details'];
     $address = $_POST['address'];
     $province_id = $_POST['province_id'];
     $type_id = $_POST['type_id'];
     $image_path = $row['img']; // ใช้รูปเดิมหากไม่ได้อัปโหลดใหม่

     // ตรวจสอบการอัปโหลดรูปใหม่
     if (!empty($_FILES['img']['tmp_name'])) {
          $target_dir = "img/data/";
          $target_file = $target_dir . basename($_FILES['img']['name']);
          $allowed_extensions = ['png', 'jpg'];
          $file_extension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));

          if (!in_array($file_extension, $allowed_extensions)) {
               echo "<script>alert('อนุญาตเฉพาะไฟล์ .png และ .jpg เท่านั้น');</script>";
          } elseif (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
               $image_path = $target_file;
          } else {
               echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดรูป');</script>";
          }
     }

     // อัปเดตข้อมูลในฐานข้อมูล
     $update_sql = "UPDATE location_all SET location_name = ?, details = ?, address = ?, province_id = ?, type_id = ?, img = ? WHERE location_id = ?";
     $update_stmt = $conn->prepare($update_sql);
     $update_stmt->bind_param("ssssisi", $location_name, $details, $address, $province_id, $type_id, $image_path, $location_id);

     if ($update_stmt->execute()) {
          echo "<script>
            alert('อัปเดตข้อมูลเรียบร้อย');
            window.location = 'data_location.php';
        </script>";
     } else {
          echo "Error: " . $update_stmt->error;
     }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <br><br>
     <div class="container mt-5">
          <h2>แก้ไขข้อมูลสถานที่</h2>
          <br>
          <form method="POST" action="" enctype="multipart/form-data">
               <div class="form-group">
                    <label for="img">เปลี่ยนรูปภาพ:</label>
                    <input type="file" name="img" id="img" class="form-control">
                    <small>รูปปัจจุบัน:</small>
                    <br>
                    <img src="<?php echo $row['img']; ?>" alt="รูปปัจจุบัน" style="max-width: 150px; max-height: 150px;">
               </div>
               <br>
               <div class="form-group">
                    <label for="location_name">ชื่อสถานที่:</label>
                    <input type="text" name="location_name" id="location_name" class="form-control" value="<?php echo htmlspecialchars($row['location_name']); ?>" required>
               </div>
               <div class="form-group">
                    <label for="details">รายละเอียด:</label>
                    <textarea name="details" id="details" class="form-control" rows="5" required><?php echo htmlspecialchars($row['details']); ?></textarea>
                    <script>
                         document.getElementById('details').addEventListener('input', function(e) {
                              // รับภาษาไทย, อังกฤษ, ตัวเลข, ช่องว่าง, บวก (+), ลบ (-), เท่ากับ (=), และเครื่องหมาย /
                              const pattern = /^[\u0E00-\u0E7F\u0041-\u005A\u0061-\u007A\u0030-\u0039\s+\-=/]+$/;
                              const value = this.value;

                              // ลบอักขระที่ไม่ตรงกับรูปแบบ
                              if (!pattern.test(value)) {
                                   this.value = value.replace(/[^ก-ฮa-zA-Z0-9\s+\-=/.]/g, '');
                              }
                         });
                    </script>
               </div>
               <div class="form-group">
                    <label for="address">ที่อยู่:</label>
                    <textarea name="address" id="address" class="form-control" rows="3" required><?php echo htmlspecialchars($row['address']); ?></textarea>
                    <script>
                         document.getElementById('address').addEventListener('input', function(e) {
                              // รับภาษาไทย, อังกฤษ, ตัวเลข, ช่องว่าง, บวก (+), ลบ (-), เท่ากับ (=), และเครื่องหมาย /
                              const pattern = /^[\u0E00-\u0E7F\u0041-\u005A\u0061-\u007A\u0030-\u0039\s+\-=/]+$/;
                              const value = this.value;

                              // ลบอักขระที่ไม่ตรงกับรูปแบบ
                              if (!pattern.test(value)) {
                                   this.value = value.replace(/[^ก-ฮa-zA-Z0-9\s+\-=/.]/g, '');
                              }
                         });
                    </script>
               </div>
               <div class="form-group">
                    <label for="province_id">จังหวัด:</label>
                    <select name="province_id" id="province_id" class="form-control" required>
                         <?php
                         // ดึงข้อมูลประเภททั้งหมดจากฐานข้อมูล
                         $type_sql = "SELECT province_id, name_province FROM province"; // สมมติว่าตารางประเภทชื่อ 'types'
                         $type_result = $conn->query($type_sql);

                         if ($type_result->num_rows > 0) {
                              while ($type_row = $type_result->fetch_assoc()) {
                                   // ตั้งค่าตัวเลือกที่เลือกไว้ล่วงหน้าจาก type_id ปัจจุบัน
                                   $selected = $type_row['province_id'] == $row['province_id'] ? "selected" : "";
                                   echo "<option value='" . $type_row['province_id'] . "' $selected>" . $type_row['name_province'] . "</option>";
                              }
                         } else {
                              echo "<option value=''>ไม่มีข้อมูลจังหวัด</option>";
                         }
                         ?>
                    </select>
               </div>
               <div class="form-group">
                    <label for="type_id">ประเภท:</label>
                    <select name="type_id" id="type_id" class="form-control" required>
                         <?php
                         // ดึงข้อมูลประเภททั้งหมดจากฐานข้อมูล
                         $type_sql = "SELECT type_id, type_name FROM type"; // สมมติว่าตารางประเภทชื่อ 'types'
                         $type_result = $conn->query($type_sql);

                         if ($type_result->num_rows > 0) {
                              while ($type_row = $type_result->fetch_assoc()) {
                                   // ตั้งค่าตัวเลือกที่เลือกไว้ล่วงหน้าจาก type_id ปัจจุบัน
                                   $selected = $type_row['type_id'] == $row['type_id'] ? "selected" : "";
                                   echo "<option value='" . $type_row['type_id'] . "' $selected>" . $type_row['type_name'] . "</option>";
                              }
                         } else {
                              echo "<option value=''>ไม่มีข้อมูลประเภท</option>";
                         }
                         ?>
                    </select>
               </div>

               <br>
               <button type="submit" class="btn text-white" style="background-color: rgb(240, 133, 2);">บันทึก</button>
               <a href="data_location.php" class="btn text-gray btn-warning" style="background-color: #ffffff;">กลับ</a>
          </form>
     </div>
</body>

</html>