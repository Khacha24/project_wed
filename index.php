<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เที่ยวทั่วไทย</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Bootstrap/css/style.css">
    <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
    <!-- ส่วนหัวเว็บไซต์ -->
    <header>
        <div class="d-flex justify-content-center w-100">
            <img src="img/logo/3ebe4afe1fe35661.PNG" alt="description of image" width="350" height="140">
        </div>

    </header>
    <?php
    include 'menu.php';
    ?>

    <!-- ส่วนแนะนำสถานที่ท่องเที่ยว -->
    <div class="centered-container">
        <div class="centered-content">
            <h1>เที่ยว<span style="color: #FF8C00;">ไหนดี?</span></h1>
        </div>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ค้นหาสถานที่ท่องเที่ยว</title>
        <link rel="stylesheet" href="bootstrap/5.3.0/css/bootstrap.min.css">
        <style>
            .search-form {
                width: 100%;
                max-width: 500px;
                margin: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                /* ทำมุมให้โค้งมน */
            }

            .form-control {
                border-radius: 20px;
                /* ปรับความโค้งของช่องค้นหา */
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
                background-color: #e69500;
            }
        </style>
    </div>

    <form class="search-form d-flex">
        <input class="form-control me-2" type="search" placeholder="ค้นหาสถานที่เที่ยว" aria-label="Search">
        <button class="btn btn-outline-success btn-search color: #fd7e14" type="submit">ค้นหา</button>
    </form>
    <br>
    <br>
    <link rel="stylesheet" href="bootstrap/5.3.0/css/main_data.css">
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="Bootstrap/css/footerstyle.css">
    <div style="position: relative; height: 200px;">
        <div class="centered-container">
            <div class="centered-content">
                <div class="h-data">
                    <h1><span style="color: #000;">แนะ<span style="color: #FF8C00;">นำ</span></h1>
                    <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position h-l">
                    </div>
                    <div <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position h-r">

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <div class="container my-5">
        <div class="row position-relative">
            <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position position-1">
                <a onclick="openPopup1()">
                    <img src="img/logo/zip_-_1.PNG" class="image-hover custom-img" alt="กลาง">
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position position-2">
                <a onclick="openPopup2()">
                    <img src="img/logo/zip_-_4.PNG" class="image-hover custom-img" alt="อีสาน">
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position position-3">
                <a onclick="openPopup3()">
                    <img src="img/logo/zip_-_5.PNG" class="image-hover custom-img" alt="เหนือ">
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position position-4">
                <a onclick="openPopup4()">
                    <img src="img/logo/zip_-_2.PNG" class="image-hover custom-img" alt="ใต้">
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4 fixed-position position-5">
                <a onclick="openPopup5()">
                    <img src="img/logo/zip_-_3.PNG" class="image-hover custom-img" alt="ตะวันออก">
                </a>
            </div>
        </div>
        <?php
        include 'popup.php';
        ?>

</body>


</html>