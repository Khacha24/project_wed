<?php
session_start();
?>
<nav class="navbar navbar-expand-lg" style="background-color: #FF8C00; width: 100%;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>

        <!-- ปุ่มสำหรับเปิดเมนูในมือถือ -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white">v</span>
        </button>

        <!-- ส่วนของเมนู -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- ส่วนกลางของเมนู -->
            <ul class="navbar-nav mx-auto" style="display: flex; gap: 100px; ">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="index.php">
                        <h5>หน้าแรก</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <h5>สถานที่ท่องเที่ยว</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <h5>ข้อมูลจังหวัด</h5>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="ccc.php">
                        <h5>ติดต่อเรา</h5>
                    </a>
                </li>
            </ul>

            <!-- ส่วนเข้าสู่ระบบ/ออกจากระบบ ที่ชิดขวา -->
            <ul class="navbar-nav">
                <?php
                // ตรวจสอบสถานะการเข้าสู่ระบบ
                if (isset($_SESSION["username"])) {
                    // ถ้าเข้าสู่ระบบแล้ว แสดงลิงก์ "ออกจากระบบ"
                    echo "<ul class='navbar-nav'>
                        <div class='container-right'>
                            <a class='nav-link text-white' href='logout.php'><b>ออกจากระบบ</b></a>
                        </div>
                      </ul>";
                } else {
                    // ถ้ายังไม่ได้เข้าสู่ระบบ แสดงลิงก์ "เข้าสู่ระบบ"
                    echo "<ul class='navbar-nav'>
                        <div class='container-right'>
                            <a class='nav-link text-white' href='login.php'><b>เข้าสู่ระบบ</b></a>
                        </div>
                      </ul>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>