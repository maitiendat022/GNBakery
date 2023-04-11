<?php 
    require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn bánh để mở bán';
    header('location:index.php');
    exit();
}
  
if($_SESSION['level'] == 0) {
    $_SESSION['error'] = 'Bạn không có quyền để truy cập';
    header('location:index.php');
    exit();
}
if($_SESSION['level'] == 2) {
    $_SESSION['error'] = 'Bạn không có quyền mở bán lại';
    header('location:index.php');
    exit();
}
$id = $_GET['id'];
$admin_id = $_SESSION['id'];

require_once '../../database/connect.php';

$sql = "update products
set status = 1, status_id = 0
where id = '$id' ";

mysqli_query($connect, $sql);

mysqli_close($connect);

$_SESSION['success'] = 'Đã mở bán thành công';
header('location:index.php');
