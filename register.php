<?php
include 'con_admin.php';
session_start();

if (isset($_SESSION["user"])) {
  echo " <script> alert('คุณกำลังออกจากระบบ'); </script>";
  echo "<script> window.location = 'logout.php';</script>";
}

// เช็คการส่งข้อมูลจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // เก็บข้อมูลใน session ก่อนเพื่อแสดงผลในฟอร์ม
  $_SESSION['firstname'] = $_POST['firstname'];
  $_SESSION['lastname'] = $_POST['lastname'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['username'] = $_POST['username'];

  // ตรวจสอบข้อผิดพลาด เช่น รหัสผ่านไม่ตรงกัน
  if ($_POST['password'] !== $_POST['password2']) {
    $_SESSION["Error_password"] = "รหัสผ่านไม่ตรงกัน";
    header("Location: register.php"); // รีโหลดหน้าใหม่
    exit();
  } else {
    // เมื่อไม่เกิดข้อผิดพลาดและบันทึกข้อมูลสำเร็จ
    // ทำการลบ session ที่เกี่ยวข้องหลังจากการบันทึกสำเร็จ
    // ต้องเก็บข้อมูลในฐานข้อมูลที่นี่
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['email']);
    unset($_SESSION['username']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
  <a href="index.php">
    <img src="img/logo/3e0f7443ad39a0ad.png" alt="Description of Image" width="350" height="140" />
  </a>
  <div style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -100%);">
    <div class="container">
      <div class="row">
        <br><br>
        <div class="alert h3" role="alert">
          สร้างบัญชี
        </div>
        <form method="POST" action="insert_register.php">
          <label for="firstname"> ชื่อ:</label>
          <input type="text" name="firstname" class="form-control" value="<?= isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '' ?>">

          <label for="lastname">นามสกุล:</label>
          <input type="text" name="lastname" class="form-control" value="<?= isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '' ?>">

          <label for="email">อีเมล:</label>
          <input type="email" name="email" class="form-control" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>">

          <label for="username">ชื่อผู้ใช้:</label>
          <input type="text" name="username" maxlength="10" class="form-control" required pattern="[A-Za-z0-9]+" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>">

          <label for="password">รหัสผ่าน:</label>
          <input type="password" name="password" maxlength="10" class="form-control">

          <?php
          if (isset($_SESSION["Error_password"])) {
            echo "<div class='text-danger'>" . $_SESSION["Error_password"] . "</div>";
            unset($_SESSION["Error_password"]);
          }
          ?>

          <label for="password2">ยืนยันรหัสผ่าน:</label>
          <input type="password" name="password2" maxlength="10" class="form-control"><br>

          <p>กลับไปที่หน้า <a href="login.php">เข้าสู่ระบบ</a></p>
          <input type="submit" name="submit" value="ยืนยัน" class="btn text-white" style="background-color: #FF8C00;">
          <input type="button" value="ยกเลิก" class="btn text-gray btn-warning" style="background-color: #ffffff;" onclick="history.back();"><br>
        </form>
      </div>
    </div>
  </div>
</body>

</html>