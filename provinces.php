<?php
require_once("con_admin.php");

// รับค่าชื่อจังหวัดจาก URL
$province = isset($_GET['province']) ? $_GET['province'] : '';

// ตรวจสอบว่ามีการส่งชื่อจังหวัดเข้ามาหรือไม่
if (!empty($province)) {
    // ดึงข้อมูลสถานที่เฉพาะจังหวัดที่เลือก
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
        WHERE province.name_province = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $province);
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
    <title>จังหวัด</title>
    <!-- Bootstrap CSS -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <br>
    <div class="contaainer mt-5">
        <h1 class="text-center mb-4">สถานที่ท่องเที่ยว<span style="color: #FF8C00;"><?php echo htmlspecialchars($province); ?></span></h1>
        <br>
        <div class="row d-flex g-1 justify-content-center">
            <?php if ($result && $result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="pu col-md-4 col-sm-6 mb-4">
                        <div class="card shadow-sm mx-auto" style="max-width: 350px;">
                            <img src="<?php echo htmlspecialchars($row['img']); ?>" class="card-img-top" alt="ไม่สามารถโหลดรูปได้" style="max-width:100%; max-height:180px; object-fit:cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['location_name']); ?></h5>
                                <p class="card-text">
                                    <strong>จังหวัด:</strong> <?php echo htmlspecialchars($row['name_province']); ?><br>
                                    <strong>ประเภท:</strong> <?php echo htmlspecialchars($row['type_name']); ?>
                                </p>
                                <a href="show_location.php?location_id=<?php echo $row['location_id']; ?>" class="btn text-white" style='background-color:rgb(240, 133, 2);'>ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p class="text-muted">ไม่มีข้อมูลสถานที่ท่องเที่ยวสำหรับจังหวัด <strong><?php echo htmlspecialchars($province); ?></strong></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>