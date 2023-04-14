<?php 
require_once '../check_admin_signin.php';
if(empty($_GET['id'])) {
    $_SESSION['error'] = 'Phải chọn để xóa';
    header('location:index.php');
    exit();
}

$id = $_GET['id'];

require_once '../../database/connect.php';
$sql = "select * from category_detail where category_id = '$id'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = 'Loại bánh này vẫn còn loại bánh phụ. Không thể xóa!';
} else {
    $sql = "delete from categories where id = '$id'";
    mysqli_query($connect, $sql);
    $_SESSION['success'] = 'Đã xóa thành công';
}

header('location:index.php');
