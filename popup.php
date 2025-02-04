<!DOCTYPE html>
<html>

<head>
    <title>Custom Popup</title>
    <link rel="stylesheet" href="Bootstrap/css/popup.css">
</head>
<script>
    function openPopup1() {
        document.getElementById("popup1").style.display = "flex";
    }

    function closePopup1() {
        document.getElementById("popup1").style.display = "none";

    }
</script>
<!-- ภาคกลางงง -->

<body>
    <div class="popup-background" id="popup1">
        <div class="popup-content">
            <div class="top">
                <h3>ข้อมูลสถานที่ท่องเที่ยว</h3>
                <button class="close-button" style="background-color: #FF8C00;" onclick="closePopup1()">
                    <h4>ปิด</h4>
                </button>
            </div>
            <div class="con">
                <div class="con-img">
                    <figure>
                        <img src="img/logo/zip_-_1.PNG" class="img" alt="กลาง">
                    </figure>
                </div>
                <div class="con-h">
                    <h3>ภาคกลาง</h3>
                    <div class="con-data">
                        <div class="column-list">
                            <ul>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="provinces.php" style="color: black; text-decoration: none;">กรุงเทพ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ราชบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">กาญจนบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ฉะเชิงเทรา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ชัยนาท</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นครนายก</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นครปฐม</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นนทบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ปทุมธานี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อยุธยา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">เพชรบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ลพบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สมุทรปราการ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สมุทรสงคราม</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สมุทรสาคร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สระบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สิงห์บุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สุพรรณบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อ่างทอง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ประจวบศีรีขันธ์</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ภาคอีสาน -->
    <script>
        function openPopup2() {
            document.getElementById("popup2").style.display = "flex";
        }

        function closePopup2() {
            document.getElementById("popup2").style.display = "none";
        }
    </script>
    <div class="popup-background" id="popup2">
        <div class="popup-content">
            <div class="top">
                <h3>ข้อมูลสถานที่ท่องเที่ยว</h3>
                <button class="close-button" style="background-color: #FF8C00;" onclick="closePopup2()">
                    <h4>ปิด</h4>
                </button>
            </div>
            <div class="con">
                <div class="con-img">
                    <figure>
                        <img src="img/logo/zip_-_4.PNG" class="img" alt="อีสาน">
                    </figure>
                </div>
                <div class="con-h">
                    <h3>ภาคอีสาน</h3>
                    <div class="con-data">
                        <div class="column-list">
                            <ul>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">โคราช</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ขอนแก่น</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">กาฬสินธุ์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ชัยภูมิ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นครพนม</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">บุรีรัมย์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">บึงกาฬ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">มหาสารคาม</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">มุกดาหาร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ยโสธร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ร้อยเอ็ด</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">เลย</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ศรีสะเกษ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สกลนคร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สุรินทร์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">หนองคาย</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">หนองบัวลำภู</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อำนาจเจริญ</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อุดรธานี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อุบลราชธานี</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ภาคเหนือ -->
    <script>
        function openPopup3() {
            document.getElementById("popup3").style.display = "flex";
        }

        function closePopup3() {
            document.getElementById("popup3").style.display = "none";
        }
    </script>
    <div class="popup-background" id="popup3">
        <div class="popup-content">
            <div class="top">
                <h3>ข้อมูลสถานที่ท่องเที่ยว</h3>
                <button class="close-button" style="background-color: #FF8C00;" onclick="closePopup3()">
                    <h4>ปิด</h4>
                </button>
            </div>
            <div class="con">
                <div class="con-img">
                    <figure>
                        <img src="img/logo/zip_-_5.PNG" class="img" alt="เหนือ">
                    </figure>
                </div>
                <div class="con-h">
                    <h3>ภาคเหนือ</h3>
                    <div class="con-data">
                        <div class="column-list">
                            <ul>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">กำแพงเพชร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">เชียงราย</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">เชียงใหม่</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นครสวรรค์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ตาก</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">น่าน</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">พะเยา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">พิจิตร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">พิษณุโลก</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">เพชรบูรณ์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">แพร่</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">แม่ฮ่องสอน</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ลำปาง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ลำปาง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สุโขทัย</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อุตรดิตถ์</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">อุทัยธานี</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ภาคใต้ -->
    <script>
        function openPopup4() {
            document.getElementById("popup4").style.display = "flex";
        }

        function closePopup4() {
            document.getElementById("popup4").style.display = "none";
        }
    </script>
    <div class="popup-background" id="popup4">
        <div class="popup-content">
            <div class="top">
                <h3>ข้อมูลสถานที่ท่องเที่ยว</h3>
                <button class="close-button" style="background-color: #FF8C00;" onclick="closePopup4()">
                    <h4>ปิด</h4>
                </button>
            </div>
            <div class="con">
                <div class="con-img">
                    <figure>
                        <img src="img/logo/zip_-_2.PNG" class="img" alt="ใต้">
                    </figure>
                </div>
                <div class="con-h">
                    <h3>ภาคใต้</h3>
                    <div class="con-data">
                        <div class="column-list">
                            <ul>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ชุมพร</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สุราษฎร์ธานี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นครศรีธรรมราช</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สงขลา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ตรัง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ระนอง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">กระบี่</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">พังงา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สตูล</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">พัทลุง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ปัตตานี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ยะลา</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">นราธิวาส</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ภาคตะวันตก -->
    <script>
        function openPopup5() {
            document.getElementById("popup5").style.display = "flex";
        }

        function closePopup5() {
            document.getElementById("popup5").style.display = "none";
        }
    </script>
    <div class="popup-background" id="popup5">
        <div class="popup-content">
            <div class="top">
                <h3>ข้อมูลสถานที่ท่องเที่ยว</h3>
                <button class="close-button" style="background-color: #FF8C00;" onclick="closePopup5()">
                    <h4>ปิด</h4>
                </button>
            </div>
            <div class="con">
                <div class="con-img">
                    <figure>
                        <img src="img/logo/zip_-_3.PNG" class="img" alt="ตะวันออก">
                    </figure>
                </div>
                <div class="con-h">
                    <h3>ภาคตะวันออก</h3>
                    <div class="con-data">
                        <div class="column-list">
                            <ul>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">จันทบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ชลบุรี</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ตราด</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ระยอง</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">สระแก้ว</a>
                                </li>
                                <li>
                                    <i class="fa fa-arrow-cirle-right " style="color:black;"></i>
                                    <a href="#" style="color: black; text-decoration: none;">ปราจีนบุรี</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>