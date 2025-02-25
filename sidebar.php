<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Dashboard</title>
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/mian_data.css">
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <div class="sidebar" id="mySidebar">
          <span class="close-btn" onclick="closeSidebar()">×</span>
          <br><br><br>
          <a href="index.php">หน้าหลัก</a>
          <a href="dashboard.php">Dashboard</a>
          <a href="data_ui.php">เพิ่มสถานที่ท่องเที่ยว</a>
          <a href="data_location.php">สถานที่ท่องเที่ยวทั้งหมด</a>
          <a href="logout.php">ออกจากระบบ</a>

     </div>

     <!-- ปุ่มเปิด Sidebar -->
     <button class="open-btn" onclick="openSidebar()">☰ เมนู</button>
     <script src="Bootstrap/js/menu_f.js"></script>
</body>

</html>