<?php
  require_once '../check_admin_signin.php';

  $idUser = $_GET['idUser'];
  $id = $_GET['id'];
  $status = $_GET['status'];
  echo($status);
  
  require_once '../../database/connect.php';
  
  $sql = "update orders
  set status = '$status', id_status = '$idUser' 
  where id = '$id'";
  
  mysqli_query($connect, $sql);
  
  header('location:index.php');