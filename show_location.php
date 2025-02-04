<?php
include 'con_admin.php';
session_start();
// รับค่า location_id จาก URL
$location_id = $_GET['location_id'];

// ดึงข้อมูลจากฐานข้อมูล พร้อมกับชื่อจังหวัดและชื่อประเภท
$query = "SELECT 
                location_all.*, 
                province.name_province, 
                type.type_name 
          FROM location_all
          LEFT JOIN province ON location_all.province_id = province.province_id
          LEFT JOIN type ON location_all.type_id = type.type_id
          WHERE location_all.location_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $location_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
