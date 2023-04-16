<?php 
    require 'check_user_cart.php';
    require 'database/connect.php';
    
    $id_order = $_GET['order_id'];
    $id_user = $_SESSION['id'];
    $status = $_GET['status'];

    if($status == 2){
        $sql = "update orders set status = 2, id_status = '$id_user', time_status = NOW()
        where id = '$id_order'";
        mysqli_query($connect, $sql);
        $_SESSION['success'] = 'Hủy đơn hàng thành công';
    }
    if($status == 4){
        $sql = "update orders set status = 4, id_status = '$id_user', time_status = NOW()
        where id = '$id_order'";
        mysqli_query($connect, $sql);
        $_SESSION['success'] = 'Xác nhận nhận hàng thành công';
    }
   
    header('location:user.php');

?>