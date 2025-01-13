<?php
include 'con_admin.php'; // เชื่อมต่อฐานข้อมูล

if (isset($_POST['id_zone'])) {
     $regionId = $_POST['id_zone']; // รับค่าจาก POST

     // คำสั่ง SQL: ดึงจังหวัดที่อยู่ใน  ที่เลือก
     $query = "SELECT * FROM province WHERE zone_id = ?";
     $stmt = $conn->prepare($query); // เตรียมคำสั่ง SQL

     if ($stmt) {
          $stmt->bind_param('i', $regionId);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
               echo '<option value="">-- เลือกจังหวัด --</option>';
               while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['province_id'] . '">' . $row['name_province'] . '</option>';
               }
          } else {
               echo '<option value="">-- ไม่มีข้อมูลจังหวัด --</option>';
          }

          $stmt->close(); // ปิด Statement
     } else {
          echo '<option value="">-- SQL Error: ' . $conn->error . ' --</option>';
     }
} else {
     echo '<option value="">-- region_id is not set --</option>';
}
