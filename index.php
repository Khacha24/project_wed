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
    <div class='d-flex justify-content-center w-100'>
        <img src='img/logo/3ebe4afe1fe35661.PNG' alt='description of image' width='350' height='140'>
    </div>
    <?php
    include 'menu.php';
    ?>

    <!-- ส่วนแนะนำสถานที่ท่องเที่ยว -->
    <div class="centered-container">
        <div class="centered-content">
            <h1>เที่ยว<span style="color: #FF8C00;">ไหนดี?</span></h1>
        </div>
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
            border-radius: 15px;
            /* ปรับความโค้งของช่องค้นหา */
        }

        .btn-search {
            /* ปรับของปุ่ม */
            border-radius: 15px;
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
    <form class="search-form d-flex">
        <input class="form-control me-2" type="search" placeholder="ค้นหาสถานที่เที่ยว" aria-label="Search">
        <button class="btn btn-outline-success btn-search color: #fd7e14" type="submit">ค้นหา</button>
    </form>

    <link rel="stylesheet" href="bootstrap/5.3.0/css/main_data.css">
    <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>
    <br><br>
    <div class="centered-container2">
        <div class="centered-content2">
            <h1><span style="color: #000;">เลือกจังหวัดที่<span style="color: #FF8C00;">คุณอยากไป</span></h1>
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
</body>


</html>