<?php 

    require './database/connect.php';
    require 'check_user_cart.php';
    $cart_id = $_GET['cart_id'];
    $product_id = $_GET['product_id'];

    $sql = "delete from cart_item
    where cart_id = $cart_id and product_id = $product_id";
    mysqli_query($connect, $sql);

    mysqli_close($connect);
    header('location:cart.php');

?>