<?php 
require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}
  
if($_GET['admin_id'] != $_SESSION['id'] || $_SESSION['level'] != 1) {
    $_SESSION['error'] = 'Bạn không có quyền để xóa';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$status = $_GET['status'];
$admin_id = $_GET['admin_id'];
require_once '../../database/connect.php';

$sql = "update users set status = $status, id_deleted = $admin_id where id = $id";
$result = mysqli_query($connect,$sql); 
if(isset($result) >0){
    $_SESSION['success'] = 'Đã xóa thành công';
    
    header("location:index.php");
    exit();
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    
    header("location:index.php");
    exit();
}

header('location:index.php');