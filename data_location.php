<?php
session_start();
if (!isset($_SESSION["admin"])) {
     echo "<script> alert('ไม่ได้รับอนุญาต'); </script>";
     echo "<script> window.location = 'index.php';</script>";
     exit();
}
include "con_admin.php";

$limit = 15;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$region = isset($_GET['region']) ? $_GET['region'] : '';
$province_id = isset($_GET['province_id']) ? $_GET['province_id'] : '';
$type_id = isset($_GET['type_id']) ? $_GET['type_id'] : '';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$whereClauses = [];
if (!empty($region)) {
     $whereClauses[] = "province.zone_id = '" . $conn->real_escape_string($region) . "'";
}
if (!empty($province_id)) {
     $whereClauses[] = "location_all.province_id = '" . $conn->real_escape_string($province_id) . "'";
}
if (!empty($type_id)) {
     $whereClauses[] = "location_all.type_id = '" . $conn->real_escape_string($type_id) . "'";
}
if (!empty($search)) {
     $whereClauses[] = "location_all.location_name LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$sql = "SELECT location_all.*, province.name_province, type.type_name 
        FROM location_all
        JOIN province ON location_all.province_id = province.province_id
        JOIN type ON location_all.type_id = type.type_id";

$countQuery = "SELECT COUNT(*) AS total FROM location_all
               JOIN province ON location_all.province_id = province.province_id
               JOIN type ON location_all.type_id = type.type_id";

if (count($whereClauses) > 0) {
     $whereCondition = " WHERE " . implode(" AND ", $whereClauses);
     $sql .= $whereCondition;
     $countQuery .= $whereCondition;
}

$sql .= " ORDER BY location_all.location_id ASC LIMIT $start, $limit";
$result = $conn->query($sql);
$countResult = $conn->query($countQuery);
$totalRows = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ข้อมูลสถานที่ทั้งหมด</title>
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
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

          .table {
               text-align: center;
          }

          img {
               max-width: 100px;
               height: auto;
          }

          .col-md-44 {
               max-width: 520px;
          }

          .modal-content {
               background: transparent;
               /* ให้พื้นหลัง Modal โปร่งใส */
               border: none;
               /* ลบขอบ */
          }

          .modal-body {
               text-align: center;
               padding: 0;
               /* ลด Padding ออก */
          }

          #modalImage {
               width: auto;
               max-width: 100%;
               max-height: 95vh;
          }
     </style>
     <script>
          function showImageModal(imageSrc) {
               document.getElementById("modalImage").src = imageSrc;
               var modal = new bootstrap.Modal(document.getElementById("imageModal"));
               modal.show();
          }
     </script>

</head>

<body>
     <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                    <div class="modal-body text-center">
                         <img id="modalImage" src="" class="img-fluid">
                    </div>
               </div>
          </div>
     </div>

     <?php
     include 'sidebar.php';
     ?>
     <div class="container">
          <h1 class="text-center">ข้อมูลสถานที่ทั้งหมด</h1>
          <br>
          <form method="GET" class="row g-2">
               <div class="col-md-44">
                    <label for="search" class="form-label">ค้นหาสถานที่</label>
                    <div class="input-group">
                         <input type="text" name="search" id="search" class="form-control" placeholder="กรอกชื่อสถานที่" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
                         <button type="submit" class="btn text-white" style="background-color:rgb(240, 133, 2);">ค้นหา</button>
                    </div>


                    <label for="province_id" class="form-label">จังหวัด</label>
                    <select name="province_id" id="province" class="form-control">
                         <option value="">-- เลือกจังหวัด --</option>
                         <?php
                         $query = "SELECT * FROM province";
                         $regions = $conn->query($query);
                         while ($row = $regions->fetch_assoc()) :
                         ?>
                              <option value="<?= $row['province_id'] ?>" <?= ($province_id == $row['province_id']) ? 'selected' : '' ?>>
                                   <?= $row['name_province'] ?>
                              </option>
                         <?php endwhile; ?>
                    </select>

                    <label for="type_id" class="form-label">ประเภท</label>
                    <select name="type_id" id="type_id" class="form-control">
                         <option value="">-- เลือกประเภท --</option>
                         <?php
                         $query = "SELECT * FROM type";
                         $types = $conn->query($query);
                         while ($row = $types->fetch_assoc()) :
                         ?>
                              <option value="<?= $row['type_id'] ?>" <?= ($type_id == $row['type_id']) ? 'selected' : '' ?>>
                                   <?= $row['type_name'] ?>
                              </option>
                         <?php endwhile; ?>
                    </select>
               </div>
          </form>
          <br>
          <a href="data_ui.php" class="btn text-white mb-3" style="background-color:rgb(240, 133, 2)">เพิ่มข้อมูลใหม่</a>
          <a href="data_location.php" class="btn text-white mb-3" style="background-color:rgb(240, 133, 2)">แสดงข้อมูลทั้งหมด</a>
          <a href="dashboard.php" class="btn text-white mb-3" style="background-color:rgb(240, 133, 2)">กลับ</a>
          <br>
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
                    <?php if ($result->num_rows > 0) : ?>
                         <?php while ($row = $result->fetch_assoc()) : ?>
                              <tr>
                                   <td>
                                        <img src="<?php echo $row['img']; ?>" alt="ไม่สามารถโหลดรูปได้" width="100"
                                             class="img-thumbnail" style="cursor: pointer;" onclick="showImageModal('<?php echo $row['img']; ?>')">
                                   </td>

                                   <td><?php echo $row['location_id']; ?></td>
                                   <td><?php echo $row['location_name']; ?></td>
                                   <td><?php echo $row['name_province']; ?></td>
                                   <td><?php echo $row['type_name']; ?></td>
                                   <td>
                                        <a href='edit.php?location_id=<?php echo $row['location_id'] ?>' class='btn btn-sm text-white' style='background-color:rgb(240, 133, 2);'>แก้ไข</a>
                                        <a href='details.php?location_id=<?php echo $row['location_id'] ?>' class='btn btn-sm text-white' style='background-color:rgb(240, 133, 2);'>รายละเอียด</a>
                                        <a href='delete.php?location_id=<?php echo $row['location_id'] ?>' class='btn btn-sm btn-danger' onclick='return confirm("คุณต้องการลบข้อมูลนี้หรือไม่?")'>ลบ</a>
                                   </td>
                              </tr>
                         <?php endwhile; ?>
                    <?php else : ?>
                         <tr>
                              <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                         </tr>
                    <?php endif; ?>
               </tbody>
          </table>
          <div class="text-center">
               <nav>
                    <ul class="pagination">
                         <?php if ($page > 1): ?>
                              <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">«</a></li>
                         <?php endif; ?>

                         <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                              <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                   <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                              </li>
                         <?php endfor; ?>

                         <?php if ($page < $totalPages): ?>
                              <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">»</a></li>
                         <?php endif; ?>
                    </ul>
               </nav>
          </div>
     </div>
</body>

</html>
<?php $conn->close(); ?>