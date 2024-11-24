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

    <!-- ส่วนแนะนำสถานที่ท่องเที่ยว -->
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
    <form class="search-form d-flex">
        <input class="form-control me-2" type="search" placeholder="ค้นหาสถานที่เที่ยวที่คุณอยากไป" aria-label="Search">
        <button class="btn btn-outline-success btn-search color: #fd7e14" type="submit">ค้นหา</button>
    </form>

    <body>
        <br><br><br><br>
        <div class="haed-img">
            <h1>---- แนะนำ<span style="color: #FF8C00;">สำหรับคุณ ----</h1>
        </div>
        <br>
        <div class="img-s">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/data/zip_-_1.png" class="d-block w-100" alt="รูป 1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/data/zip_-_3.png" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/data/zip_-_6.png" class="d-block w-100" alt="Slide 3">
                    </div>
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
        <br><br><br>
    </body>

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