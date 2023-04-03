<?php 

require './database/connect.php';
require 'check_user_cart.php';
session_start();
$id = $_GET['id'];
$sql = "select * from products
  where id = $id";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);

$action =(isset($_GET['action'])) ? $_GET['action'] : 'add';




$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
//session_destroy();
//die();
if($quantity <= 0){
  unset($_SESSION['cart'][$id]['quantity']);
}

$item = [
  'id' =>$each['id'],
  'name' => $each['name'],
  'image' => $each['image'],
  'size' => $each['size'],
  'price' => $each['price'],
  'quantity' => $quantity

];

if($action == 'add'){

    if(isset($_SESSION['cart'][$id])){
       $_SESSION['cart'][$id]['quantity'] += $quantity;
      }
    else {
       $_SESSION['cart'][$id] = $item;
         }
}
if($action == 'delete'){

unset($_SESSION['cart'][$id]);
 }
if($action == 'update'){
$_SESSION['cart'][$id]['quantity'] = $quantity;
}

header('location:cart.php');
echo "<pre>";
print_r($_SESSION['cart']);

?>