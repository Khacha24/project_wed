<?php
require 'con_admin.php'; // เชื่อมต่อฐานข้อมูล
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือยัง
if (!isset($_SESSION['username'])) {
     die("กรุณาเข้าสู่ระบบก่อน");
}

$message = "";

// ถ้าผู้ใช้กดปุ่มเปลี่ยนรหัสผ่าน
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $user_id = $_SESSION['username'];
     $old_password = $_POST['old_password'];
     $new_password = $_POST['new_password'];
     $confirm_password = $_POST['confirm_password'];

     // ตรวจสอบรหัสผ่านเก่าจากฐานข้อมูล
     $sql = "SELECT password FROM user WHERE id = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("i", $user_id);
     $stmt->execute();
     $stmt->bind_result($hashed_password);
     $stmt->fetch();
     $stmt->close();

     if (!$hashed_password || !password_verify($old_password, $hashed_password)) {
          $message = "รหัสผ่านเก่าไม่ถูกต้อง!";
     } elseif ($new_password !== $confirm_password) {
          $message = "รหัสผ่านใหม่ทั้งสองช่องต้องตรงกัน!";
     } elseif (strlen($new_password) < 6) {
          $message = "รหัสผ่านใหม่ต้องมีความยาวอย่างน้อย 6 ตัวอักษร!";
     } else {
          // แฮชรหัสผ่านใหม่
          $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

          // อัปเดตรหัสผ่านในฐานข้อมูล
          $sql = "UPDATE user SET password = ? WHERE id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("si", $new_hashed_password, $user_id);

          if ($stmt->execute()) {
               $message = "เปลี่ยนรหัสผ่านสำเร็จ!";
          } else {
               $message = "เกิดข้อผิดพลาด กรุณาลองอีกครั้ง!";
          }
          $stmt->close();
     }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>เปลี่ยนรหัสผ่าน</title>
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
     <script>
          function checkPasswordMatch() {
               var password = document.getElementById("password").value;
               var confirmPassword = document.getElementById("password2").value;
               var message = document.getElementById("passwordError");

               if (password && confirmPassword) { // ตรวจสอบว่าทั้งสองช่องมีค่า
                    if (password !== confirmPassword) {
                         message.style.color = "red";
                         message.textContent = "รหัสผ่านไม่ตรงกัน";
                    } else {
                         message.style.color = "green";
                         message.textContent = "รหัสผ่านตรงกัน";
                    }
               } else {
                    message.textContent = ""; // ไม่แสดงข้อความถ้าช่องใดช่องหนึ่งยังว่าง
               }
          }
     </script>
</head>

<body>
     <div class="container mt-5">
          <h2 class="text-center">เปลี่ยนรหัสผ่าน</h2>
          <?php if ($message) {
               echo "<p>$message</p>";
          } ?>

          <form method="POST" action="">
               <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน:</label>
                    <input type="password" id="old_password" name="old_password" class="form-control" required oninput="checkPasswordMatch()">


                    <label for="password" class="form-label">รหัสผ่านใหม่:</label>
                    <input type="password" id="password" name="new_password" class="form-control" required oninput="checkPasswordMatch()">


                    <label for="password2" class="form-label">ยืนยันรหัสผ่าน:</label>
                    <input type="password" id="password2" name="confirm_password" class="form-control" required oninput="checkPasswordMatch()">
                    <div id="passwordError"></div>
               </div>
               <input type="submit" name="submit" value="เปลื่ยนรหัสผ่าน" class="btn text-white" style="background-color: #FF8C00;">
               <input type="button" value="ยกเลิก" class="btn text-gray btn-warning" style="background-color: #ffffff;" onclick="history.back();"><br>
          </form>
     </div>
</body>

</html>