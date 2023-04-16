<?php 
require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}
    
$id = $_GET['id'];
$page = $_GET['page'];
$status = $_GET['status'];
$admin_id = $_GET['admin_id'];
require_once '../../database/connect.php';
if($status == 1){
    $sql = "update users set status = 0, id_deleted = $admin_id where id = $id";
    $result = mysqli_query($connect,$sql); 
    $_SESSION['success'] = "Bạn đã xóa tài khoản nhân viên NVGN$id";

}else{
    $sql = "update users set status = 1, id_deleted = $admin_id where id = $id";
    $result = mysqli_query($connect,$sql); 
    $_SESSION['success'] = "Khôi phục tài khoản NVGN$id thành công";
 
}
header("location:index.php?page=$page");