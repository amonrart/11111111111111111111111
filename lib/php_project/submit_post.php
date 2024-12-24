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

// รับข้อมูลจากฟอร์ม
$category = $_POST['category'];
$title = $_POST['title'];
$content = $_POST['content'];

// จัดการอัปโหลดรูปภาพ
$image_path = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
    }
    $image_path = $upload_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
}

// เพิ่มข้อมูลลงในฐานข้อมูล
$sql = "INSERT INTO posts (category, title, content, image_path) VALUES ('$category', '$title', '$content', '$image_path')";

if ($conn->query($sql) === TRUE) {
    echo "โพสต์สำเร็จ!";
    echo "<br><a href='view_posts.php'>ดูโพสต์ทั้งหมด</a>";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
