<?php
  require_once '../check_admin_signin.php';

  $id = $_GET['id'];
  $status = $_GET['status'];
  
  require_once '../../database/connect.php';
  
  $sql = "update orders
  set status = '$status'
  where id = '$id'";
  
  mysqli_query($connect, $sql);
  
  header('location:index.php');