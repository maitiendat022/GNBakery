<?php

session_start();
if(empty($_SESSION['id'])){
    header('location:./signin.php');
    exit();
}
$order_id = $_POST['order_id'];
$user_id = $_POST['user_id'];
$product_id = $_POST['product_id'];
if(empty($_POST['rating'])){
  $error = 'Vui lòng chọn sao';
  header("location:product.php?error=$error&id=$product_id&id_user=$user_id&id_order=$order_id&status_order=3");
  exit;
}
require './database/connect.php';

$star = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO ratings (user_id, product_id, order_id ,star, comment) VALUES ('$user_id', '$product_id','$order_id', '$star', '$comment')";
mysqli_query($connect,$sql);

$_SESSION['success'] = "Đánh giá sản phẩm thành công";
header("location:product.php?id=$product_id&id_user=$user_id&id_order=$order_id&status_order=3");

$connect->close();
?>