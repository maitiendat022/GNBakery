<?php
  require_once '../check_admin_signin.php';

  $idUser = $_GET['idUser'];
  $id = $_GET['id'];
  $page = $_GET['page'];
  $status = $_GET['status'];
  echo($status);
  
  require_once '../../database/connect.php';
  
  $sql = "update orders
  set status = '$status', id_status = '$idUser', time_status = NOW()
  where id = '$id'";
  
  mysqli_query($connect, $sql);
  
  header("location:index.php?page=$page");