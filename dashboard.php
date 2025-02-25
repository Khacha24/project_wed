<?php
session_start();
if (!isset($_SESSION["admin"])) {
     echo " <script> alert('ไม่ได้รับอนุญาต'); </script>";
     echo "<script> window.location = 'index.php';</script>";
     exit();
}
require_once("con_admin.php");

// ดึงข้อมูลภาค (Zone) พร้อมจำนวนจังหวัด
$sql_zones = "SELECT zone.name_zone, COUNT(province.province_id) AS province_count
              FROM zone
              LEFT JOIN province ON zone.zone_id = province.zone_id
              GROUP BY zone.zone_id";
$result_zones = mysqli_query($conn, $sql_zones);
$zones_data = [];
while ($row = mysqli_fetch_assoc($result_zones)) {
     $zones_data[] = $row;
}

// ดึงข้อมูลจังหวัด (Province) พร้อมจำนวนสถานที่ท่องเที่ยว
$sql_provinces = "SELECT province.name_province, COUNT(location_all.location_id) AS location_count
                  FROM province
                  LEFT JOIN location_all ON province.province_id = location_all.province_id
                  GROUP BY province.province_id";
$result_provinces = mysqli_query($conn, $sql_provinces);
$provinces_data = [];
$total_locations = 0; // เก็บจำนวนสถานที่ทั้งหมด
while ($row = mysqli_fetch_assoc($result_provinces)) {
     $provinces_data[] = $row;
     $total_locations += $row['location_count']; // คำนวณรวมจำนวนสถานที่ทั้งหมด
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
     <style>
          body {
               background-color: #f8f9fa;
          }

          .container {
               background: white;
               border-radius: 10px;
               padding: 20px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
          }

          .chart-container {
               width: 80%;
               margin: auto;
          }
     </style>
</head>

<body>
     <?php
     include 'sidebar.php';
     ?>
     <div class="container mt-5">
          <h1 class="text-center mb-4">Dashboard</h1>
          <!-- จำนวนสถานที่ทั้งหมด -->
          <div class="text-center mb-4">
               <div class="card bg-dark text-white">
                    <div class="card-body">
                         <h4>จำนวนสถานที่ท่องเที่ยวทั้งหมด</h4>
                         <h2><?php echo number_format($total_locations); ?> สถานที่</h2>
                    </div>
               </div>
          </div>

          <!-- ตารางข้อมูลภาคพร้อมจำนวนจังหวัด -->
          <h3 class="text-center">รายชื่อภาคและจำนวนจังหวัด</h3>
          <table class="table table-bordered table-striped text-center">
               <thead class="table-dark">
                    <tr>
                         <th>ชื่อภาค</th>
                         <th>จำนวนจังหวัด</th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($zones_data as $zone) : ?>
                         <tr>
                              <td><?php echo htmlspecialchars($zone['name_zone']); ?></td>
                              <td><?php echo htmlspecialchars($zone['province_count']); ?></td>
                         </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>


          <!-- กราฟแสดงจำนวนจังหวัดในแต่ละภาค -->
          <div class="chart-container">
               <canvas id="zoneChart"></canvas>
          </div>

          <h3 class="text-center mt-5">รายชื่อจังหวัดและจำนวนสถานที่ท่องเที่ยว</h3>

          <div class="province-list">
               <?php foreach ($provinces_data as $province) : ?>
                    <div class="province-item">
                         <a href="provinces.php?province=<?php echo urlencode($province['name_province']); ?>" class="province-name">
                              <?php echo htmlspecialchars($province['name_province']); ?>
                         </a>
                         <span class="location-count"><?php echo htmlspecialchars($province['location_count']); ?> สถานที่</span>
                    </div>
               <?php endforeach; ?>
          </div>

          <style>
               .province-list {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                    justify-content: center;
               }

               .province-item {
                    background: #f8f9fa;
                    padding: 8px 15px;
                    border-radius: 5px;
                    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
                    font-size: 16px;
                    display: flex;
                    align-items: center;
                    gap: 5px;
               }

               /* ชื่อจังหวัดเป็นสีดำ */
               .province-name {
                    font-weight: bold;
                    color: #000000;
                    /* สีดำ */
                    text-decoration: none;
                    cursor: pointer;
               }

               .province-name:hover {
                    text-decoration: underline;
               }

               /* จำนวนสถานที่เป็นสีส้ม */
               .location-count {
                    color: #FF8C00;
                    /* สีส้ม */
                    /* font-weight: bold; */
               }
          </style>

          <br>


          <!-- กราฟแสดงจำนวนสถานที่ท่องเที่ยวในแต่ละจังหวัด -->
          <div class="chart-container">
               <canvas id="provinceChart"></canvas>
          </div>
     </div>

     <script>
          // ข้อมูลภาค (Zone)
          const zoneLabels = <?php echo json_encode(array_column($zones_data, 'name_zone')); ?>;
          const zoneData = <?php echo json_encode(array_column($zones_data, 'province_count')); ?>;

          const ctxZone = document.getElementById('zoneChart').getContext('2d');
          new Chart(ctxZone, {
               type: 'bar',
               data: {
                    labels: zoneLabels,
                    datasets: [{
                         label: 'จำนวนจังหวัด',
                         data: zoneData,
                         backgroundColor: 'rgb(250, 150, 28)',
                         borderColor: 'rgb(240, 133, 2)',
                         borderWidth: 1
                    }]
               },
               options: {
                    responsive: true,
                    scales: {
                         y: {
                              beginAtZero: true
                         }
                    }
               }
          });

          // ข้อมูลจังหวัด (Province)
          const provinceLabels = <?php echo json_encode(array_column($provinces_data, 'name_province')); ?>;
          const provinceData = <?php echo json_encode(array_column($provinces_data, 'location_count')); ?>;

          const ctxProvince = document.getElementById('provinceChart').getContext('2d');
          new Chart(ctxProvince, {
               type: 'bar',
               data: {
                    labels: provinceLabels,
                    datasets: [{
                         label: 'จำนวนสถานที่ท่องเที่ยว',
                         data: provinceData,
                         backgroundColor: 'rgb(250, 150, 28)',
                         borderColor: 'rgb(240, 133, 2)',
                         borderWidth: 1
                    }]
               },
               options: {
                    responsive: true,
                    scales: {
                         y: {
                              beginAtZero: true
                         }
                    }
               }
          });
     </script>
</body>

</html>