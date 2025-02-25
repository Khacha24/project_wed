<?php
require_once("con_admin.php");

if (isset($_GET["token"])) {
     $token = $_GET["token"];

     // ตรวจสอบโทเค็น
     $stmt = $conn->prepare("SELECT id FROM user WHERE reset_token = ? AND reset_expires > NOW()");
     $stmt->bind_param("s", $token);
     $stmt->execute();
     $result = $stmt->get_result();

     if ($result->num_rows === 0) {
          die("ลิงก์รีเซ็ตรหัสผ่านไม่ถูกต้องหรือหมดอายุแล้ว");
     }

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // ตรวจสอบว่ารหัสผ่านทั้งสองช่องตรงกันหรือไม่
          if ($_POST["password"] !== $_POST["password2"]) {
               echo "<script>
        alert('รหัสผ่านไม่ถูกต้อง');
        window.location = 'forgot_password.php';
    </script>";
          }

          $new_password = hash('sha512', $_POST["password"]);

          // อัปเดตรหัสผ่านและลบโทเค็น
          $stmt = $conn->prepare("UPDATE user SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
          $stmt->bind_param("ss", $new_password, $token);
          $stmt->execute();

          echo "<script>
        alert('เปลื่ยนรหัสผ่านสำเร็จ');
        window.location = 'login.php';
    </script>";
          exit;
     }
} else {
     die("ไม่พบโทเค็นรีเซ็ตรหัสผ่าน");
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ลืมรหัสผ่าน</title>
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
          <h2 class="text-center">รีเซ็ตรหัสผ่าน</h2>
          <form method="POST" action="">
               <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่านใหม่</label>
                    <input type="password" id="password" name="password" class="form-control" required oninput="checkPasswordMatch()">


                    <label for="password2" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" id="password2" name="password2" class="form-control" required oninput="checkPasswordMatch()">
                    <div id="passwordError"></div>
               </div>
               <input type="submit" name="submit" value="เปลื่ยนรหัสผ่าน" class="btn text-white" style="background-color: #FF8C00;">
          </form>
     </div>
</body>

</html>