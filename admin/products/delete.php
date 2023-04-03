<?php 
    require_once '../check_admin_signin.php';

if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}
  
if($_GET['admin_id'] != $_SESSION['id'] || $_SESSION['level'] != 1) {
    $_SESSION['error'] = 'Bạn không có quyền để xóa bánh này';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$admin_id = $_GET['admin_id'];
require_once '../../database/connect.php';

$sql_num_product = "select * from order_product where id = '$id'";
$result_num_product = mysqli_query($connect, $sql);
if(mysqli_num_rows($result_num_product) == 0) {
    $sql = "delete from products where id = '$id' and user_id = '$admin_id'";
}
else {
    $sql = "update products set status = 0 where id = '$id' and user_id = '$admin_id'";
}

mysqli_query($connect, $sql);
$error = mysqli_errno($connect);
mysqli_close($connect);
if(isset($error)) {
    $_SESSION['error'] = 'Không thể xóa bánh này';
} else {
    $_SESSION['success'] = 'Đã xóa thành công';
}

header('location:index.php');
