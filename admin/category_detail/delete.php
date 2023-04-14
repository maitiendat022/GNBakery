<?php 
require_once '../check_admin_signin.php';
if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];

require_once '../../database/connect.php';

$sql = "select * from products where category_detail_id = '$id'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = 'Loại bánh này vẫn còn sản phẩm. Không thể xóa!';
} else {
    $sql = "delete from category_detail where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Đã xóa thành công';
}

header('location:index.php');




