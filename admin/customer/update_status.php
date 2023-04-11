<?php 
require_once '../check_admin_signin.php';


$id = $_GET['id'];
$status = $_GET['status'];
$level = $_SESSION['level'];
$admin_id = $_SESSION['id'];
require_once '../../database/connect.php';
if($status == 1){
    $sql = "update users set status = 0, id_deleted = $admin_id where id = $id";
    $result = mysqli_query($connect,$sql); 
    if(isset($result) >0){ 
    header("location:index.php");
    exit();
    }
}
if($status == 0 && $level == 1){
    $sql = "update users set status = 1 where id = $id";
    $result = mysqli_query($connect,$sql); 
    if(isset($result) >0){ 
    header("location:index.php");
    exit();
    }
}else{
    $_SESSION['error'] = "Bạn không có quyền khôi phục";
    header("location:index.php");
    exit();
}


header('location:index.php');