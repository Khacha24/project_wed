<?php
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เมนูเปิดปิด</title>
    <link rel="stylesheet" href="Bootstrap/css/menu_style.css">
</head>

<body>
    <div class='d-flex justify-content-center w-100'>
        <img src='img/logo/3e0f7443ad39a0ad.png' alt='description of image' width='360' height='150'>
    </div>
    <nav class="navbar">
        <div class="container">
            <button class="menu-toggle" id="menu-toggle">☰</button>
            <div class="navbar-links" id="navbar-links">
                <ul>
                    <li><a href="index.php" class="links">หน้าแรก</a></li>
                    <li><a href=" #" class="links">แนะนำสถานที่ท่องเที่ยว</a></li>
                    <li><a href="#" class="links">ข้อมูลจังหวัด</a></li>
                    <li><a href="contact.php" class="links">เกี่ยวกับเรา</a></li>
                    <?php
                    if (isset($_SESSION["admin"])) {
                        echo "<li><a href='admin.php'class='links'>admin</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class="login-links">
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<a href='logout.php'class='links'>ออกจากระบบ</a>";
                } else {
                    echo "<a href='login.php'class='links'>เข้าสู่ระบบ</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <script src="Bootstrap/js/menu_f.js"></script>
</body>

</html>