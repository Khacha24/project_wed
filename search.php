<?php
include 'con_admin.php';

// รับค่าจากฟอร์ม
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

// ตรวจสอบว่ามีค่าค้นหาหรือไม่
if (!empty($query)) {
     // คำสั่ง SQL ที่แก้ไขแล้ว
     $sql =
          "SELECT 
            location_all.*, 
            province.name_province, 
            type.type_name
        FROM 
            location_all
        JOIN
            province ON location_all.province_id = province.province_id
        JOIN 
            type ON location_all.type_id = type.type_id
        WHERE 
            location_name LIKE ? OR 
            type_name LIKE ? OR 
            name_province LIKE ?";
     $stmt = $conn->prepare($sql);
     $search = "%$query%";
     $stmt->bind_param("sss", $search, $search, $search);
     $stmt->execute();
     $result = $stmt->get_result();
} else {

     $sql =
          "SELECT 
            location_all.*, 
            province.name_province, 
            type.type_name
        FROM 
            location_all
        JOIN
            province ON location_all.province_id = province.province_id
        JOIN 
            type ON location_all.type_id = type.type_id
        LIMIT 10";
     $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ค้นหาสถานที่ท่องเที่ยว</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/s_provinces.css">
     <link rel="stylesheet" href="Bootstrap/css/style.css">

</head>

<body>

     <?php include 'menu.php'; ?>
     <br><br><br>
     <link rel="stylesheet" href="bootstrap/5.3.0/css/bootstrap.min.css">
     <style>
          .search-form {
               width: 100%;
               max-width: 600px;
               margin: auto;
               display: flex;
               justify-content: center;
               align-items: center;

          }

          .form-control {
               border-radius: 20px;

          }

          .btn-search {
               border-radius: 20px;
               padding: 8px 20px;
               font-weight: bold;
               font-size: 1em;
               background-color: #FF8C00;
               color: white;
               border: none;
          }

          .btn-search:hover {
               background-color: #FF8C00;
          }
     </style>
     <form class="search-form d-flex" action="search.php" method="GET">
          <input class="form-control me-2" type="search" name="query" placeholder="ค้นหาสถานที่เที่ยวที่คุณอยากไป" aria-label="Search">
          <button class="btn btn-outline-success btn-search" style="color:rgb(255, 255, 255);" type="submit">ค้นหา</button>
     </form>
     <br><br>
     <h2 class="text-center">ผลการค้นหา: "<?php echo htmlspecialchars($query); ?>"</h2>
     <div class="contaainer mt-5">
          <br>
          <div class="row d-flex g-1 justify-content-center">
               <?php if ($result && $result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                         <div class="puu col-md-4 col-sm-6 mb-4">
                              <a href="show_location.php?location_id=<?php echo $row['location_id']; ?>" class="text-decoration-none text-dark">
                                   <div class="card shadow-sm mx-auto" style="max-width: 350px;">
                                        <img src="<?php echo htmlspecialchars($row['img']); ?>" class="card-img-top" alt="ไม่สามารถโหลดรูปได้" style="max-width:100%; max-height:180px; object-fit:cover;">
                                        <div class="card-body text-center">
                                             <h5 class="card-title"><?php echo htmlspecialchars($row['location_name']); ?></h5>
                                             <p class="card-text">
                                                  <strong>จังหวัด:</strong> <?php echo htmlspecialchars($row['name_province']); ?><br>
                                                  <strong>ประเภท:</strong> <?php echo htmlspecialchars($row['type_name']); ?>
                                             </p>
                                        </div>
                                   </div>
                              </a>
                         </div>
                    <?php endwhile; ?>
               <?php else : ?>
                    <div class="col-12 text-center">
                         <p class="text-muted">ไม่พบข้อมูลที่ค้นหา</p>
                    </div>
               <?php endif; ?>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$stmt->close();
$conn->close();
?>