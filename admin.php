<?php
session_start();
if (isset($_SESSION["admin"])) {
} else {
     echo " <script> alert('ไม่ได้รับอนุญาต'); </script>";
     echo "<script> window.location = 'index.php';</script>";
}
?>
<?php include 'con_admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <a href="index.php">
          <img src="img/logo/3e0f7443ad39a0ad.png" alt="Description of Image" width="350" height="140" />
     </a>
     <div class="d-flex justify-content-center w-100 container">
          <div class="row">
               <br><br>
               <div class="alert h3" role="alert">
                    admin
               </div>
               <form method="POST" action="data_ui.php">
                    <input type="submit" name="submit" value="เพิ่มข้อมูลสถานที่" class="btn text-white " style="background-color: rgb(240, 133, 2);">
               </form><br><br>
               <form method="POST" action="data_location.php">
                    <input type="submit" name="submit" value="ดูข้อมูลสถานที่ทั้งหมด" class="btn text-white " style="background-color:rgb(240, 133, 2);">
               </form><br><br>
               <form method="POST" action="index.php">
                    <input type="submit" name="submit" value="กลับหน้าหลัก" class="btn text-white " style="background-color:rgb(240, 133, 2);">
               </form>
          </div>
     </div>
</body>

</html>