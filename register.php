<?php
include 'connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
  <?php
  include 'menu.php';
  ?>
  <div style="position: absolute; top: 95%; left: 50%; transform: translate(-50%, -100%);">
    <div class="container">
      <div class="row">
        <br><br>
        <div class="alert h3" role="alert">
          สร้างบัญชี
        </div>
        <form method="POST" action="insert_register.php">
          <input type="text" name="firstname" class="form-control" required placeholder="ชื่อ"> <br>
          <input type="text" name="lastname" class="form-control" required placeholder="นามสกุล"><br>
          <input type="number" name="phone" class="form-control" required placeholder="เบอร์โทรศัพท์"><br>
          <input type="text" name="username" maxlength="10" class="form-control" required placeholder="ชื่อผู้ใช้"><br>
          <input type="password" name="password" maxlength="10" class="form-control" required placeholder="รหัสผ่าน"><br>
          <?php
          if (isset($_SESSION["Error_password"])) {
            echo "<div class = 'pass text-danger'>";
            echo $_SESSION["Error_password"];
            echo "</div>";
            unset($_SESSION["Error_password"]);
          }
          ?>
          <input type="password" name="password2" maxlength="10" class="form-control" required placeholder="ยืนยันรหัสผ่าน"><br>
          <input type="submit" name="submit" value="ยืนยัน" class="btn text-white " style="background-color: #FF8C00;">
          <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " style="background-color: #ffffff; "><br>
          <br>
        </form>
      </div>
    </div>

  </div>
</body>

</html>