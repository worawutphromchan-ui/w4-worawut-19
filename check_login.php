<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "w4_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

// 1. ค้นหาผู้ใช้จาก username
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $db_password = $row['password'];

    // 2. เช็กทั้งแบบเทียบตรงๆ หรือเช็กผ่าน password_verify
    if ($password === $db_password || password_verify($password, $db_password)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "Password ไม่ถูกต้อง";
    }
} else {
    echo "ไม่พบ Username นี้ในระบบ";
}
?>