<?php 
    require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}
  
if($_SESSION['level'] == 0) {
    $_SESSION['error'] = 'Bạn không có quyền để xóa bánh này';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$admin_id = $_SESSION['id'];
require_once '../../database/connect.php';

$sql = "update products set status = 0, status_id = $admin_id where id = '$id'";

mysqli_query($connect, $sql);

$_SESSION['success'] = 'Đã xóa thành công';

header('location:index.php');
