<?php
// การตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$database = "post_system";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

// แสดงผลในรูปแบบตาราง
echo "<h1>โพสต์ทั้งหมด</h1>";
echo "<table border='1' cellpadding='10' style='width:100%; text-align:left;'>";
echo "<tr>
        <th>ID</th>
        <th>หมวดหมู่</th>
        <th>หัวเรื่อง</th>
        <th>เนื้อหา</th>
        <th>รูปภาพ</th>
        <th>วันที่โพสต์</th>
      </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['content'] . "</td>";
        echo "<td><img src='" . $row['image_path'] . "' alt='Image' style='width:100px;'></td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>ไม่มีโพสต์</td></tr>";
}
echo "</table>";

// ปิดการเชื่อมต่อ
$conn->close();
?>
