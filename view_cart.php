<?php 
session_start();
if(empty($_SESSION['id'])){
    header('location:./signin.php');
    exit();
}
require './database/connect.php';
require 'check_user_cart.php';


$id = $_GET['id'];
$size = $_GET['size-btn'];

$sql = "select products.* ,price from products
join products_size on products.id = products_size.product_id
where products.id = '$id' and products_size.size = $size";

$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

if($each['status']==0){
  $_SESSION['success'] = 'Sản phẩm này đã ngừng bán vui lòng chọn sản phẩm khác';
  header("location: ./index.php");   
  exit;   
}

$action =(isset($_GET['action'])) ? $_GET['action'] : 'add';

$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
//session_destroy();
//die();
if($quantity <= 0){
  unset($_SESSION['cart'][$id]['quantity']);
}

$item = [
  'id' => $each['id'],
  'name' => $each['name'],
  'image' => $each['image'],
  'size' => $size,
  'price' => $each['price'],
  'quantity' => $quantity
];

$cart_item_key = $id . '-' . $size;

if ($action == 'add') {
  if (isset($_SESSION['cart'][$cart_item_key])) {
    $_SESSION['success'] = 'Thêm thành công'; 
    $_SESSION['cart'][$cart_item_key]['quantity'] += $quantity;
  } else {
    $_SESSION['success'] = 'Thêm thành công';
    $_SESSION['cart'][$cart_item_key] = $item;
  }
}
if($action == 'delete'){
  $_SESSION['success'] = 'Đã xóa sản phẩm khỏi giỏ';
  unset($_SESSION['cart'][$cart_item_key]);
 }
if($action == 'update'){
  $_SESSION['success'] = 'Thêm thành công';
  $_SESSION['cart'][$cart_item_key]['quantity'] = $quantity;
}

header('location:cart.php');
echo "<pre>";
print_r($_SESSION['cart']);

