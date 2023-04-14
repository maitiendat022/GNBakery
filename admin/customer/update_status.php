<?php 
require_once '../check_admin_signin.php';


$id = $_GET['id'];
$page = $_GET['page'];
$status = $_GET['status'];
$level = $_SESSION['level'];
$admin_id = $_SESSION['id'];
require_once '../../database/connect.php';
if($status == 1){
    $sql = "update users set status = 0, id_deleted = $admin_id where id = $id";
    $result = mysqli_query($connect,$sql); 
    if(isset($result) >0){ 
        $_SESSION['success'] = "Xóa tài khoản thành công";
        header("location:index.php?page=$page");
        exit();
    }
}
if($status == 0 && $level == 1){
    $sql = "update users set status = 1,id_deleted = $admin_id where id = $id";
    $result = mysqli_query($connect,$sql); 
    if(isset($result) >0){ 
        $_SESSION['success'] = "Khôi phục tài khoản thành công";
        header("location:index.php?page=$page");
        exit();
    }
}else{
    $_SESSION['error'] = "Bạn không có quyền khôi phục";
    header("location:index.php?page=$page");
    exit();
}
