<?php
session_start();
require './database/connect.php';


$id = $_GET['id'];
$size = $_GET['size-btn'];

$sql = "select products.* ,price from products
join products_size on products.id = products_size.product_id
where products.id = '$id' and products_size.size = $size";

$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

if($each['status']==0){
  $_SESSION['success'] = 'Sản phẩm này đã ngừng bán vui lòng chọn sản phẩm khác';
  header("location:index.php");   
  exit;   
}
$sqlSize = "select * from products_size where products_size.product_id = '$id' ";
$resultSize = mysqli_query($connect, $sqlSize);

if(mysqli_num_rows($resultSize) > 1){
    $_SESSION['success'] = 'Vui lòng chọn kích thước';
    header("location:product.php?id=$id");   
    exit;   
}else{
    header("location:view_cart.php?id=$id&size-btn=$size");   
    exit; 
}

