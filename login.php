<?php
include 'connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
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
  <div style="position: absolute; top: 75%; left: 50%; transform: translate(-50%, -100%);">
    <div class="container">
      <div class="row">
        <br> <br>
        <div class="alert h4" role="alert">
          เข้าสู่ระบบ / สร้างบัญชี
        </div>
        <form method="POST" action="login_check.php">
          <input type="text" name="username" maxlength="10" class="form-control" required placeholder="Username"><br>
          <input type="password" name="password" maxlength="10" class="form-control" rrequired placeholder="Password"><br>
          <?php
          if (isset($_SESSION["Error"])) {
            echo "<div class = 'text-danger'>";
            echo $_SESSION["Error"];
            echo "</div>";
            unset($_SESSION["Error"]);
          }
          ?>
          <p>คุณยังไม่มีบัญชี? <a href="register.php">สร้างบัญชี</a> ที่นี่</p>
          <input type="submit" name="submit" value="ยืนยัน" class="btn text-white " style="background-color: #FF8C00;">
          <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " style="background-color: #ffffff; "><br>

          <br>

        </form>
      </div>
    </div>
  </div>
</body>

</html>