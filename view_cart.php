<?php 

require './database/connect.php';
require 'check_user_cart.php';


$size = $_GET['size-btn'];

$id = $_GET['id'];
$sql = "select products.* ,price from products
join products_size on products.id = products_size.product_id
where products.id = '$id' and products_size.size = $size";

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
  'size' => $size,
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