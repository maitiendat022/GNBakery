<?php
  require_once '../check_admin_signin.php';

  $idUser = $_GET['idUser'];
  $id = $_GET['id'];
  $page = $_GET['page'];
  $status = $_GET['status'];
  echo($status);
  
  require_once '../../database/connect.php';
  if($status == 1){
    $sql = "update orders set status = '$status', id_status = '$idUser', time_status = NOW()
    where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = "Bạn đã duyệt đơn hàng DHGN$id";
    header("location:index.php?page=$page&search_status=$status");
  }
  if($status == 2){
    $sql = "update orders set status = '$status', id_status = '$idUser', time_status = NOW()
    where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = "Bạn đã hủy đơn hàng DHGN$id";
    header("location:index.php?page=$page&search_status=$status");
  }
  if($status == 3){
    $sql = "update orders set status = '$status', id_status = '$idUser', time_status = NOW()
    where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = "Bạn đã xác nhận giao hàng đơn hàng DHGN$id thành công";
    header("location:index.php?page=$page&search_status=$status");
  }
  
  