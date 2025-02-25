<?php
require_once("con_admin.php");

// รับค่าประเภทจาก URL
$type = isset($_GET['type']) ? $_GET['type'] : '';

// ตรวจสอบว่ามีการส่งประเภทเข้ามาหรือไม่
if (!empty($type)) {
     // ดึงข้อมูลสถานที่เฉพาะประเภทที่เลือก
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
        WHERE type.type_name = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $type);
     $stmt->execute();
     $result = $stmt->get_result();
} else {
     $result = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ประเภทสถานที่ท่องเที่ยว</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <?php include 'menu.php'; ?>
     <br>
     <div class="centered-container">
          <div class="centered-content">
               <h1>คุณอยากไป<span style="color: #FF8C00;">ที่ไหนล่ะ ?</span></h1>
               <i class="fi fi-rs-map-marker"></i>
          </div>
     </div>
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
     <div class="conttainer mt-5">
          <h1 class="text-center mb-4">สถานที่ท่องเที่ยวประเภท: <span style="color: #FF8C00;"><?php echo htmlspecialchars($type); ?></span></h1>
          <br>
          <div class="row d-flex g-1 justify-content-center">
               <?php if ($result && $result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                         <div class="col-md-4 col-sm-6 mb-4">
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
                         <p class="text-muted">ไม่มีข้อมูลสถานที่ท่องเที่ยวสำหรับประเภท <strong><?php echo htmlspecialchars($type); ?></strong></p>
                    </div>
               <?php endif; ?>
          </div>
     </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>