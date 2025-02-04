<?php
include 'con_admin.php';
session_start();
if (isset($_SESSION["admin"])) {
} else {
     echo " <script> alert('ไม่ได้รับอนุญาตให้เข้า'); </script>";
     echo "<script> window.location = 'login.php';</script>";
}
// รับค่า location_id จาก URL
$location_id = $_GET['location_id'];

// ดึงข้อมูลจากฐานข้อมูล พร้อมกับชื่อจังหวัดและชื่อประเภท
$query = "SELECT 
                location_all.*, 
                province.name_province, 
                type.type_name 
          FROM location_all
          LEFT JOIN province ON location_all.province_id = province.province_id
          LEFT JOIN type ON location_all.type_id = type.type_id
          WHERE location_all.location_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $location_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>รายละเอียดสถานที่</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
     <style>
          /* ปรับให้ข้อมูลในตารางอยู่ทางซ้าย */
          td,
          tr {
               text-align: left;

               /* ทำให้ข้อมูลอยู่ทางซ้าย */
          }

          /* ปรับให้รูปภาพอยู่ทางซ้าย */
          .img-container {
               text-align: center;
          }

          .img-container img {
               max-width: 250px;
               max-height: 250px;
          }
     </style>
</head>

<body>
     <br><br><br>
     <div class="container">
          <h2>รายละเอียดของสถานที่</h2>
          <table class="table">
               <br><br>
               <tr>
                    <td colspan="2" class="img-container">
                         <img src="<?php echo $row['img']; ?>" alt="รูปปัจจุบัน">
                    </td>
               <tr>
                    <th>รหัสสถานที่:</th>
                    <td><?php echo $row['location_id']; ?></td>
               </tr>
               <tr>
                    <th>ชื่อสถานที่:</th>
                    <td><?php echo $row['location_name']; ?></td>
               </tr>
               <tr>
                    <th>รายละเอียด</th>
                    <td><?php echo $row['details']; ?></td>
               </tr>
               <tr>
                    <th>ที่อยู่</th>
                    <td><?php echo $row['address']; ?></td>
               </tr>
               <tr>
                    <th>จังหวัด</th>
                    <td><?php echo $row['name_province']; ?></td>
               </tr>
               <tr>
                    <th>ประเภท</th>
                    <td><?php echo $row['type_name']; ?></td>
               </tr>
          </table>
          <br>
          <a href='edit.php?location_id=<?php echo $row['location_id'] ?>' class='btn text-white' style='background-color:rgb(240, 133, 2);'>แก้ไข</a>
          <a href="data_location.php" class="btn text-gray btn-warning" style="background-color: #ffffff;">กลับ</a>
     </div>
</body>

</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$stmt->close();
$conn->close();
?>