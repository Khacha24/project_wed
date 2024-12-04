<?php
include 'con_admin.php';
session_start();
if (isset($_SESSION["admin"])) {
} else {
     echo " <script> alert('ไม่ได้รับอนุญาตให้เข้า'); </script>";
     echo "<script> window.location = 'login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>เพิ่มสถานที่ท่องเที่ยว</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <a href="index.php">
          <img src="img/logo/3e0f7443ad39a0ad.png" alt="Description of Image" width="350" height="140" />
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
                    <label for="dropdown1">ภาค:</label>
                    <?php
                    $sql = "SELECT * FROM zone ORDER BY 'id_ zone'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select id="dropdown1">
                         <option value="">เลือกภาค</option>
                         <?php
                         if ($result->num_rows > 0) {
                              // แสดงผลแต่ละแถว
                              while ($row = $result->fetch_assoc()) {
                                   echo "<option value='" . $row['id_ zone'] . "'>" . $row['name_zone'] . "</option>";
                              }
                         } else {
                              echo "<option value=''>ไม่มีข้อมูล</option>";
                         }
                         ?>
                    </select>
                    <br><br>
                    <?php
                    $sql = "SELECT * FROM province ORDER BY 'id_province'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <label for="dropdown2">จังหวัด:</label>
                    <select id="dropdown2">
                         <option value="">เลือกจังหวัด</option>
                         <?php
                         if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                                   echo "<option value='" . $row['id_province'] . "'>" . $row['name_province'] . "</option>";
                              }
                         } else {
                              echo "<option value=''>ไม่มีข้อมูล</option>";
                         }
                         ?>
                    </select>
                    <br><br>
                    <input type="text" name="name_location" class="form-control" required placeholder="ชื่อสถานที่ท่องเที่ยว"> <br>
                    <input type="text" name="firstname" class="form-control" required placeholder="รายละเอียด"> <br>
                    <input type="text" name="address" class="form-control" required placeholder="ที่อยู่"> <br>
                    <input type="submit" name="submit" value="เพิ่ม" class="btn text-white " style="background-color: #FF8C00;">
                    <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " href="admin.php" style="background-color: #ffffff; "><br>
                    <br><a href="admin.php">กลับ</a>
               </form>
          </div>
     </div>
     </div>
</body>

</html>