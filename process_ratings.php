<?php
session_start();
if(empty($_SESSION['id'])){
    header('location:./signin.php');
    exit();
}
require './database/connect.php';
// Xử lý dữ liệu đầu vào
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
$star = $_POST['rating'];
$comment = $_POST['comment'];

// Thêm mới bản ghi vào bảng ratings
$sql = "INSERT INTO ratings (user_id, product_id, star, comment) VALUES ('$user_id', '$product_id', '$star', '$comment')";
if ($connect->query($sql) === TRUE) {
  echo "Đánh giá sản phẩm thành công";
} else {
  echo "Lỗi: " . $sql . "<br>" . $connect->error;
}

// Đóng kết nối đến CSDL
$connect->close();
?>