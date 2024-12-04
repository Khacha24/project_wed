<?php
if (isset($_GET['region_id'])) {
     $regionId = intval($_GET['region_id']);
     $conn = new mysqli('localhost', 'root', '', 'your_database_name');

     if ($conn->connect_error) {
          die('Connection failed: ' . $conn->connect_error);
     }

     $stmt = $conn->prepare("SELECT * FROM provinces WHERE region_id = ?");
     $stmt->bind_param("i", $regionId);
     $stmt->execute();
     $result = $stmt->get_result();

     $options = "<option value=''>-- เลือกจังหวัด --</option>";
     while ($row = $result->fetch_assoc()) {
          $options .= "<option value='{$row['id']}'>{$row['name']}</option>";
     }

     echo $options;

     $stmt->close();
     $conn->close();
}
