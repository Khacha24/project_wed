<?php
session_start();
require_once("con_admin.php");

// ดึงข้อมูลสถานที่เฉพาะจังหวัดกรุงเทพ
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
    WHERE province.name_province = 'กรุงเทพ'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานที่ท่องเที่ยวในกรุงเทพ</title>
    <!-- Bootstrap CSS -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">สถานที่ท่องเที่ยวในกรุงเทพมหานคร</h1>
        <div class="row">
            <?php if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="ไม่สามารถโหลดรูปได้" style="width:100%; height:180px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['location_name']); ?></h5>
                                <p class="card-text">
                                    จังหวัด: <?php echo htmlspecialchars($row['name_province']); ?><br>
                                    ประเภท: <?php echo htmlspecialchars($row['type_name']); ?>
                                </p>
                                <a href="details.php?location_id=<?php echo $row['location_id']; ?>" style='background-color:rgb(240, 133, 2);' class='btn text-white'>ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p>ไม่มีข้อมูลสถานที่ท่องเที่ยวในกรุงเทพมหานคร</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>