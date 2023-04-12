<?php 
    require 'check_user_cart.php';
    require 'database/connect.php';
    
    $id_order = $_GET['order_id'];
    $id_user = $_SESSION['id'];

    $sql = "update orders set status = 2, id_status = '$id_user' 
    where id = '$id_order'";
  
    mysqli_query($connect, $sql);

    $_SESSION['success'] = 'Hủy đơn hàng thành công';
    header('location:user.php');

?>