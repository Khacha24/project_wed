<?php
include 'con_admin.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>เพิ่มสถานที่ท่องเที่ยว</title>
     <!-- Bootstrap CSS -->
     <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="Bootstrap/css/style.css">
</head>

<body>
     <a href="index.php">
          <img src="img/logo/3e0f7443ad39a0ad.png" alt="Description of Image" width="350" height="140" />
     </a>
     <style>
          .container {
               max-width: 500px;
               width: 100%;
          }
     </style>
     <br><br><br>
     <div class="container">
          <div class="row">
               <div class="alert h3" role="alert">
                    เพิ่มสถานที่ท่องเที่ยว
               </div>

               <form method="POST" action="add_data.php">
                    <label for="dropdown1">ภาค:</label>
                    <select id="dropdown1">
                         <option value="">เลือกภาค</option>
                         <option value="option2">กลาง</option>
                         <option value="option3">อีสาน</option>
                         <option value="option4">เหนือ</option>
                         <option value="option4">ใต้</option>
                         <option value="option4">ตะวันออก</option>
                    </select>
                    <br><br>
                    <label for="dropdown2">จังหวัด:</label>
                    <select id="dropdown2">
                         <option value="">เลือกจังหวัด</option>
                    </select>
                    <script>
                         $(document).ready(function() {
                              // เก็บข้อมูลตัวเลือกสำหรับดรอปดาวน์ที่สอง
                              const options = {
                                   option2: [{
                                             value: "apple",
                                             text: "แอปเปิ้ล"
                                        },
                                        {
                                             value: "banana",
                                             text: "กล้วย"
                                        },
                                        {
                                             value: "cherry",
                                             text: "เชอร์รี่"
                                        }
                                   ],
                                   option3: [{
                                             value: "dog",
                                             text: "สุนัข"
                                        },
                                        {
                                             value: "cat",
                                             text: "แมว"
                                        },
                                        {
                                             value: "elephant",
                                             text: "ช้าง"
                                        }
                                   ]
                              };

                              $("#dropdown1").change(function() {
                                   const selectedOption = $(this).val(); // ค่าที่เลือกในดรอปดาวน์แรก
                                   const dropdown2 = $("#dropdown2"); // ดรอปดาวน์ที่สอง
                                   dropdown2.empty(); // ลบตัวเลือกเก่าทั้งหมด

                                   // ถ้าเลือกตัวเลือกแรกที่ไม่ใช่ค่าว่าง ให้แสดงตัวเลือกที่สองที่เกี่ยวข้อง
                                   if (selectedOption && options[selectedOption]) {
                                        dropdown2.append('<option value="">เลือกจังหวัด</option>');
                                        options[selectedOption].forEach(function(option) {
                                             dropdown2.append(new Option(option.text, option.value));
                                        });
                                   } else {
                                        dropdown2.append('<option value="">เลือกจังหวัด</option>'); // ถ้าไม่ได้เลือกก็แสดงข้อความเริ่มต้น
                                   }
                              });
                         });
                    </script>
                    <br><br>
                    <input type="text" name="name_location" class="form-control" required placeholder="ชื่อสถานที่ท่องเที่ยว"> <br>
                    <input type="text" name="firstname" class="form-control" required placeholder="รายละเอียด"> <br>
                    <input type="submit" name="submit" value="เพิ่ม" class="btn text-white " style="background-color: #FF8C00;">
                    <input type="reset" name="submit" value="ยกเลิก" class=" btn text-gray btn-warning " href="admin.php" style="background-color: #ffffff; "><br>
                    <br><a href="admin.php">กลับ</a>
               </form>
          </div>
     </div>
     </div>
</body>

</html>