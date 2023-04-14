<?php

require_once './database/connect.php';

$cart_id = $_GET['cart_id'];
$product_id = $_GET['product_id'];
$type = $_GET['type'];

$sql = "select quantity from cart_item where cart_id = $cart_id and product_id = $product_id";
$result = mysqli_query($connect, $sql);
$quantity = mysqli_fetch_assoc($result)['quantity'];
if($type === 'decre') {
    if($quantity > 1) {
        $sql = "update cart_item
        set quantity = quantity - 1
        where cart_id = '$cart_id' and product_id = '$product_id'";
        mysqli_query($connect, $sql);
    } else {
        $sql = "delete from cart_item
        where cart_id = $cart_id and product_id = $product_id";
        mysqli_query($connect, $sql);
    }
} else {
    $sql = "update cart_item
    set quantity = quantity + 1
    where cart_id = $cart_id and product_id = $product_id";
    mysqli_query($connect, $sql);
}

header('location:cart.php');