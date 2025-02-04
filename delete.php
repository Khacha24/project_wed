     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "backticks";

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
     }

     if (isset($_GET['location_id'])) {
          $id = $_GET['location_id'];
          $sql = "DELETE FROM location_all WHERE location_id = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("i", $id);

          if ($stmt->execute()) {
               echo "<script>alert('ลบข้อมูลสำเร็จ!'); window.location = 'data_location.php';</script>";
          } else {
               echo "<script>alert('เกิดข้อผิดพลาด!'); window.location = 'data_location.php';</script>";
          }
          $stmt->close();
     }

     $conn->close();
