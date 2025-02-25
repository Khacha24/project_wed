<?php
require 'con_admin.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $token = $_POST["token"];
     $new_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

     // ตรวจสอบว่าโทเค็นถูกต้องหรือไม่
     $stmt = $conn->prepare("SELECT id FROM user WHERE reset_token = ? AND reset_expires > NOW()");
     $stmt->bind_param("s", $token);
     $stmt->execute();
     $stmt->store_result();

     if ($stmt->num_rows > 0) {
          // อัปเดตรหัสผ่านใหม่
          $stmt->bind_result($user_id);
          $stmt->fetch();
          $stmt = $conn->prepare("UPDATE user SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
          $stmt->bind_param("si", $new_password, $user_id);
          $stmt->execute();

          echo "✅ เปลี่ยนรหัสผ่านสำเร็จ! สามารถเข้าสู่ระบบได้เลย";
     } else {
          echo "❌ ลิงก์นี้หมดอายุหรือไม่ถูกต้อง";
     }
}
