<?php
session_start();

if(empty($_SESSION['id'])){
  header('location:./signin.php');
  exit();
}

if(empty($_SESSION['cart'])) {
    header('location:cart.php');
    exit;
}

if(empty($_POST['name_receiver']) || empty($_POST['phone_receiver']) || empty($_POST['address_receiver'])) {
    header('location:confirminfo.php');
    exit;
}

$name_receiver = $_POST['name_receiver'];
$address_receiver = $_POST['address_receiver'];
$phone_receiver = $_POST['phone_receiver'];

require './cart_function.php';
$cart = $_SESSION['cart'];
$total_price = total_price($cart);
$id = $_SESSION['id'];
$status = 0;

require './database/connect.php';

$sql = "insert into orders(user_id, name_receiver, address_receiver, phone_receiver, status, total_price) 
values('$id', '$name_receiver', '$address_receiver', '$phone_receiver', '$status', '$total_price')";

mysqli_query($connect, $sql);
$last_order_id = mysqli_insert_id($connect);

foreach($cart as $product_id => $each){
    $quantity = $each['quantity'];
    $sql = "insert into order_product(order_id, product_id, quantity) 
    values('$last_order_id', '$product_id', '$quantity')";
    mysqli_query($connect, $sql);
}

mysqli_close($connect);
unset($_SESSION['cart']);

$_SESSION['success'] = 'Đặt hàng thành công';
header('location:./index.php');