<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เที่ยวทั่วไทย</title>
    <link rel="stylesheet" href="styles.css">
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Bootstrap/css/style.css">
    <link rel="stylesheet" href="Bootstrap/css/style.css">

</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <br><br>
    <!-- ส่วนแนะนำสถานที่ท่องเที่ยว -->
    <div class="centered-container">
        <div class="centered-content">
            <h1>คุณอยากไป<span style="color: #FF8C00;">ที่ไหนล่ะ ?</span></h1>
            <i class="fi fi-rs-map-marker"></i>
        </div>
    </div>
    <br>
    <link rel="stylesheet" href="bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .search-form {
            width: 100%;
            max-width: 600px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            /* ทำมุมให้โค้งมน */
        }

        .form-control {
            border-radius: 20px;

        }

        .btn-search {
            /* ปรับของปุ่ม */
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

    <body>
        <br><br><br><br>
        <?php
        require 'con_admin.php'; // เชื่อมต่อฐานข้อมูล

        // ดึงข้อมูลรูปภาพจากตาราง location_all แบบสุ่ม 4 รูป
        $sql = "SELECT img, location_id FROM location_all ORDER BY RAND() LIMIT 4";
        $result = $conn->query($sql);
        ?>

        <div class="haed-img">
            <h1>---- แนะนำ<span style="color: #FF8C00;">สำหรับคุณ ----</h1>
        </div>
        <br>
        <div class="img-s">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<button type="button" data-bs-target="#carouselExample" data-bs-slide-to="' . $i . '" ';
                        echo ($i == 0) ? 'class="active" aria-current="true"' : '';
                        echo ' aria-label="Slide ' . ($i + 1) . '"></button>';
                        $i++;
                    }
                    ?>
                </div>

                <div class="carousel-inner">
                    <?php
                    $result->data_seek(0); // รีเซ็ต pointer ของ result set
                    $first = true;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
                        // ล้อมรอบภาพด้วยลิงก์
                        echo '<a href="show_location.php?location_id=' . $row["location_id"] . '">';
                        echo '<img src="' . $row["img"] . '" alt="Image">';
                        echo '</a>';
                        echo '</div>';
                        $first = false;
                    }
                    ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <?php
        $conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
        ?>


        <br><br><br>

        <div class="centered-container2">
            <div class="centered-content2">
                <h1><span style="color: #000;">---- เลือกจังหวัดที่<span style="color: #FF8C00;">คุณอยากไป ----</span></h1>
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a onclick="openPopup1()">
                                <img src="img/logo/zip_-_1.PNG" class="image-hover custom-img" alt="ภาคกลาง">
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a onclick="openPopup2()">
                                <img src="img/logo/zip_-_4.PNG" class="image-hover custom-img" alt="ภาคอีสาน">
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a onclick="openPopup3()">
                                <img src="img/logo/zip_-_5.PNG" class="image-hover custom-img" alt="ภาคเหนือ">
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a onclick="openPopup4()">
                                <img src="img/logo/zip_-_2.PNG" class="image-hover custom-img" alt="ภาคใต้">
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a onclick="openPopup5()">
                                <img src="img/logo/zip_-_3.PNG" class="image-hover custom-img" alt="ภาคตะวันออก">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'popup.php'; ?>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <br><br><br><br><br>
        <?php include 'footer.php'; ?>
    </body>


</html>