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
               max-width: 750px;
               width: 100%;
          }
     </style>
     <br><br><br>
     <div class="container">
          <div class="row">
               <div class="alert h3" role="alert">
                    เพิ่มสถานที่ท่องเที่ยว
               </div>
               <form method="POST" action="add_data.php" enctype="multipart/form-data">
                    <!-- Dropdown สำหรับภาค -->
                    <label for="region">ภาค:</label>
                    <select id="region" name="region">
                         <option value="">-- เลือกภาค --</option>
                         <?php
                         include 'con_admin.php';
                         $query = "SELECT * FROM zone";
                         $result = $conn->query($query);
                         while ($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row['zone_id'] . '">' . $row['name_zone'] . '</option>';
                         }
                         ?>
                    </select>

                    <!-- Dropdown สำหรับจังหวัด -->
                    <label for="province">จังหวัด:</label>
                    <select id="province" name="province_id">
                         <option value="">-- เลือกจังหวัด --</option>
                    </select>
                    <script>
                         // เมื่อเลือกภาค ให้โหลดจังหวัด
                         $('#region').change(function() {
                              const regionId = $(this).val();
                              if (regionId) {
                                   $.ajax({
                                        type: 'POST',
                                        url: 'get_provinces.php',
                                        data: {
                                             id_zone: regionId
                                        },
                                        success: function(response) {
                                             $('#province').html(response);
                                        }
                                   });
                              } else {
                                   $('#province').html('<option value="">-- เลือกจังหวัด --</option>');
                              }
                         });
                    </script>
                    <label for="region">ประเภท:</label>
                    <select id="type_id" name="type_id">
                         <option value="">-- เลือกประเภท --</option>
                         <?php
                         include 'con_admin.php';
                         $query = "SELECT * FROM type";
                         $result = $conn->query($query);
                         while ($row = $result->fetch_assoc()) {
                              echo '<option value="' . $row['type_id'] . '">' . $row['type_name'] . '</option>';
                         }
                         ?>
                    </select>
                    <br><br>
                    <label for="img">อัปโหลดรูปภาพ:</label>
                    <input type="file" name="img" class="form-control" required accept="image/*">
                    <br>
                    <input type="text" name="location_name" class="form-control" required placeholder="ชื่อสถานที่ท่องเที่ยว"> <br>
                    <input type="text" name="details" class="form-control" required placeholder="รายละเอียด"> <br>
                    <input type="text" name="address" class="form-control" required placeholder="ที่อยู่"> <br>
                    <input type="submit" name="submit" value="เพิ่ม" class="btn text-white " style="background-color: #FF8C00;">
                    <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " href="admin.php" style="background-color: #ffffff; "><br>
                    <br><a href="admin.php">กลับ</a>
               </form>
</body>

</html>