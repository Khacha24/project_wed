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
        <a href="index.php">
            <img src="img/logo/3e0f7443ad39a0ad.png" alt="Description of Image" width="350" height="140" />
        </a>
    </div>
    <nav class="navbar">
        <div class="container">
            <button class="menu-toggle" id="menu-toggle">☰</button>
            <div class="navbar-links" id="navbar-links">
                <ul>
                    <li><a href="index.php" class="links">หน้าแรก</a></li>
                    <li><a href=" #" class="links">สถานที่ท่องเที่ยวยอดนิยม</a></li>
                    <li><a href="contact.php" class="links">เกี่ยวกับเรา</a></li>
                    <?php
                    if (isset($_SESSION["admin"])) {
                        echo "<li><a href='dashboard.php'class='links'>admin</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <div class='dropdown'>
                <?php
                if (isset($_SESSION["username"])) {
                    echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>";
                    echo "สวัสดีคุณ ";
                    echo $_SESSION["username"];
                    echo "</button>";
                    echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>";
                    echo "<li><a class='dropdown-item' href='change_password.php'>เปลื่ยนรหัสผ่าน</a></li>";
                    echo "<li><a class='dropdown-item' href='logout.php'>ออกจากระบบ</a></li>";
                    echo "</ul>";
                } else {
                    echo "<a href='login.php' class='links'>เข้าสู่ระบบ</a>";
                }

                ?>
            </div>
        </div>
    </nav>
    <script src="Bootstrap/js/menu_f.js"></script>
</body>

</html>