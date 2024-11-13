<?php
include 'con_admin.php';
session_start();
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
     <a href="index.php">
          <img src="img/logo/3ebe4afe1fe35661.PNG" alt="Description of Image" width="350" height="140" />
     </a>
     <style>
          .container {
               max-width: 500px;
               width: 100%;
          }
     </style>
     <br><br><br>
     <div class="container">
          <div class="row">
               <div class="alert h3" role="alert">
                    เพิ่มสถานที่ท่องเที่ยว
               </div>
               <form method="POST" action="add_data.php">
                    <input type="text" name="name_zone" class="form-control" required placeholder="ภาค"> <br>
                    <input type="text" name="name_province" class="form-control" required placeholder="จังหวัด"><br>
                    <br><br>
                    <input type="submit" name="submit" value="เพิ่ม" class="btn text-white " style="background-color: #FF8C00;">
                    <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " href="admin.php" style="background-color: #ffffff; "><br>
                    <br><a href="admin.php">กลับ</a>
               </form>
          </div>
     </div>
     </div>
</body>

</html>