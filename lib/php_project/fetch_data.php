<?php
include 'db_connect.php'; // นำไฟล์ db_connect.php มาใช้

$sql = "SELECT * FROM your_table_name"; // คำสั่ง SQL
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงข้อมูล
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - ชื่อ: " . $row["name"] . "<br>";
    }
} else {
    echo "ไม่มีข้อมูล";
}
$conn->close();
?>

