<?php
$servername = "localhost"; // ชื่อเซิร์ฟเวอร์
$username = "root";       // ชื่อผู้ใช้ (ค่าเริ่มต้นคือ root)
$password = "";           // รหัสผ่าน (ค่าเริ่มต้นคือว่างเปล่า)
$dbname = "your_database_name"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
?>
C:\Users\AdviceIT\Downloads\php-8.4.2\php-8.4.2