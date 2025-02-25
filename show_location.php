<?php
include 'con_admin.php';

// รับค่า location_id จาก URL
$location_id = $_GET['location_id'];

// ดึงข้อมูลสถานที่พร้อมชื่อจังหวัดและประเภท
$query = "SELECT 
                location_all.*, 
                province.name_province, 
                type.type_name 
          FROM location_all
          INNER JOIN province ON location_all.province_id = province.province_id
          INNER JOIN type ON location_all.type_id = type.type_id
          WHERE location_all.location_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $location_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// ดึงข้อมูลหมวดหมู่ทั้งหมด
$categoryQuery = "SELECT type_name, COUNT(location_id) as total FROM location_all 
                  JOIN type ON location_all.type_id = type.type_id 
                  GROUP BY type.type_id";
$categoryResult = $conn->query($categoryQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>เที่ยวทั่วไทย</title>
      <link rel="stylesheet" href="styles.css">
      <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="Bootstrap/css/style.css">
      <link rel="stylesheet" href="Bootstrap/css/s_provinces.css">
      <style>
            .category-list {
                  margin-top: 100px;
                  margin-left: 60px;
                  text-align: left;
            }

            .category-list h2 {
                  font-size: 24px;
                  margin-bottom: 15px;
                  color: #fd7e14;
            }

            .category-list ul {
                  list-style: none;
                  padding: 0;
            }

            .category-list ul li {
                  margin: 10px 0;
                  font-size: 16px;
            }

            .category-list ul li a {
                  color: #333;
                  text-decoration: none;
            }

            .category-list ul li a:hover {
                  color: #fd7e14;
                  text-decoration: underline;
            }
      </style>
</head>

<body>
      <?php include 'menu.php'; ?>
      <div class="container my-4">
            <div class="row">
                  <!-- Content Section -->
                  <div class="col-lg-8">
                        <h1><?php echo $row['location_name']; ?></h1>
                        <br>
                        <img src="<?php echo $row['img']; ?>" alt="ไม่สามารถโหลดรูปได้" width="750" height="460">
                        <br>
                        <div class="mt-4">
                              <p style="font-size: 18px;"><?php echo nl2br($row['details']); ?></p>
                              <p style="font-size: 18px;">ที่อยู่: <?php echo $row['address']; ?></p>
                        </div>
                  </div>
                  <div class="col-lg-4">
                        <div class="category-list">
                              <h2>หมวดหมู่</h2>
                              <ul>
                                    <?php while ($category = $categoryResult->fetch_assoc()) : ?>
                                          <li>
                                                <a href="show_type.php?type=<?php echo urlencode($category['type_name']); ?>">
                                                      <?php echo htmlspecialchars($category['type_name']); ?>
                                                      (<?php echo $category['total']; ?>)
                                                </a>
                                          </li>
                                    <?php endwhile; ?>
                              </ul>
                        </div>
                  </div>
            </div>
      </div>
</body>

</html>