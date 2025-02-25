<?php
session_start();
require 'con_admin.php'; // เชื่อมต่อฐานข้อมูล
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $email = trim($_POST["email"]); // รับอีเมลจากฟอร์ม

     // 🔍 ตรวจสอบว่าอีเมลมีอยู่ในฐานข้อมูลหรือไม่
     $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->store_result();

     if ($stmt->num_rows > 0) {
          // 🔹 สร้างโทเค็นสุ่ม
          $token = bin2hex(random_bytes(32)); // สุ่มโทเค็น 64 ตัวอักษร
          $expiry = date("Y-m-d H:i:s", strtotime("+1 day")); // กำหนดให้หมดอายุในวันพรุ่งนี้

          // 💾 บันทึกโทเค็นลงฐานข้อมูล
          $stmt = $conn->prepare("UPDATE user SET reset_token = ?, reset_expires = ? WHERE email = ?");
          $stmt->bind_param("sss", $token, $expiry, $email);
          $stmt->execute();

          // 🔗 สร้างลิงก์รีเซ็ตรหัสผ่าน
          $reset_link = "http://yourwebsite.com/reset_password.php?token=" . $token;

          // 📧 ตั้งค่า PHPMailer เพื่อส่งอีเมล
          $mail = new PHPMailer(true);
          try {
               $mail->isSMTP();
               $mail->Host       = 'smtp.gmail.com';
               $mail->SMTPAuth   = true;
               $mail->Username   = 'khacha0981207463@gmail.com'; // 📌 เปลี่ยนเป็นอีเมลของคุณ
               $mail->Password   = 'vivtyhwcuqbtixvn';  // 📌 เปลี่ยนเป็น App Password ของคุณ
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
               $mail->Port       = 587;

               // ตั้งค่าผู้ส่งและผู้รับ
               $mail->setFrom('khacha0981207463@gmail.com', 'Admin');
               $mail->addAddress($email);

               // ตั้งค่าหัวข้อและเนื้อหาอีเมล
               $reset_link = "http://localhost/db/reset_password.php?token=" . $token;
               $mail->isHTML(true);
               $mail->Subject = 'resetpassword';
               $mail->Body = "<html><body>
                    <div style='font-family: Arial, sans-serif; max-width: 600px; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);'>
                        <h2 style='color: #333;'>🔒 รีเซ็ตรหัสผ่านของคุณ</h2>
                        <p>เรียน <strong>เรียนผู้ใช้งานเว็บไซต์ เที่ยวทั่วไทย</strong>,</p>
                        <p>เราได้รับคำขอให้รีเซ็ตรหัสผ่านของคุณ หากคุณเป็นผู้ร้องขอ โปรดคลิกลิงก์ด้านล่าง:</p>
                        <p style='text-align: center;'>
                            <a href='$reset_link' style='background: #FF8C00; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;'>
                            รีเซ็ตรหัสผ่าน
                            </a>
                        </p>
                        <p>หากคุณไม่ได้ร้องขอการรีเซ็ตรหัสผ่าน โปรดเพิกเฉยต่ออีเมลนี้</p>
                        <p>ลิงก์นี้จะหมดอายุใน <strong>24 ชั่วโมง</strong> เพื่อความปลอดภัยของคุณ</p>
                        <p>หากมีปัญหา กรุณาติดต่อฝ่ายสนับสนุนที่ <a href='mailto:support@yourwebsite.com'>khacha0981207463@gmail.com</a></p>
                        <hr>
                        <p style='text-align: center; color: #777;'>ขอแสดงความนับถือ<br>ทีมสนับสนุน เที่ยวทั่วไทย</p>
                    </div>
               </body></html>";


               $mail->send();

               echo "<script>alert('ส่งอีเมลสำเร็จ'); window.location = 'forgot_password.php';</script>";
          } catch (Exception $e) {
               echo "<script>alert('เกิดข้อผิดพลาด'); window.location = 'forgot_password.php';</script>";
          }
     } else {
          echo "<script>alert('อีเมลนี้ไม่มีอยู่ในระบบ'); window.location = 'forgot_password.php';</script>";
     }
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
</head>

<body>
     <div class="container mt-5">
          <h2 class="text-center">ลืมรหัสผ่าน</h2>
          <?php if (!empty($success)) : ?>
               <div class="alert alert-success"><?php echo $success; ?></div>
          <?php elseif (!empty($error)) : ?>
               <div class="alert alert-danger"><?php echo $error; ?></div>
          <?php endif; ?>

          <form method="POST" action="">
               <div class="mb-3">
                    <label for="email" class="form-label">กรอกอีเมลของคุณ</label>
                    <input type="email" name="email" class="form-control" required>
               </div>
               <input type="submit" name="submit" value="ยืนยัน" class="btn text-white " style="background-color: #FF8C00;">
               <input type="button" value="ยกเลิก" class="btn text-gray btn-warning" style="background-color: #ffffff;" onclick="history.back();">
          </form>
     </div>
</body>

</html>