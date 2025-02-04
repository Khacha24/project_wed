<?php
session_start();
if (isset($_SESSION["admin"])) {
} else {
     echo " <script> alert('ไม่ได้รับอนุญาต'); </script>";
     echo "<script> window.location = 'index.php';</script>";
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backticks"; // ชื่อฐานข้อมูล

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT 
        location_all.*, 
        province.name_province, 
        type.type_name 
    FROM 
        location_all
    JOIN 
        province ON location_all.province_id = province.province_id
    JOIN 
        type ON location_all.type_id = type.type_id
    ORDER BY location_all.location_id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
     <style>
          .container {
               margin-top: 20px;
          }

          .table {
               text-align: center;
          }

          img {
               max-width: 100px;
               height: auto;
          }
     </style>
</head>

<body>
     <div class="container">
          <h1 class="text-center">ข้อมูลสถานที่ทั้งหมด</h1>
          <br>
          <a href="data_ui.php" class="btn text-white mb-3 " style="background-color:rgb(240, 133, 2)" ;>+เพิ่มข้อมูลใหม่</a>
          <a href="admin.php" class="btn text-white mb-3 " style="background-color:rgb(240, 133, 2)" ;>กลับ</a>
          <table class="table table-bordered">
               <thead>
                    <tr>
                         <th>รูปภาพ</th>
                         <th>รหัสสถานที่</th>
                         <th>ชื่อ</th>
                         <th>จังหวัด</th>
                         <th>ประเภท</th>
                         <th>จัดการ</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    if ($result->num_rows > 0) :
                         while ($row = $result->fetch_assoc()) : ?>

                              <tr>
                                   <td>
                                        <img src="<?php echo $row['img']; ?>" alt="ไม่สามารถโหลดรูปได้" Image" width="250" height="250">
                                   </td>
                                   <td><?php echo $row['location_id']; ?></td>
                                   <td><?php echo $row['location_name']; ?></td>
                                   <td><?php echo $row['name_province']; ?></td>
                                   <td><?php echo $row['type_name']; ?></td>
                                   <td>
                                        <a href='edit.php?location_id=<?php echo $row['location_id'] ?>' class='btn text-white btn-sm' style='background-color:rgb(240, 133, 2);'>แก้ไข</a>
                                        <a href='details.php?location_id=<?php echo $row['location_id'] ?>' class='btn text-white btn-sm' style='background-color:rgb(240, 133, 2);'>รายละเอียด</a>
                                        <a href='delete.php?location_id=<?php echo $row['location_id'] ?>' class='btn btn-danger btn-sm' onclick='return confirm("คุณต้องการลบข้อมูลนี้หรือไม่?")'>ลบ</a>
                                   </td>
                              </tr>
                         <?php endwhile;
                    else : ?>
                         <tr>
                              <td colspan='7' class='text-center'>ไม่มีข้อมูล</td>
                         </tr>
                    <?php endif; ?>
               </tbody>
          </table>
     </div>
</body>

</html>
<?php $conn->close(); ?>