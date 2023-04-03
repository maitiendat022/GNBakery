<?php
require_once '../check_super_admin_signin.php';

if(empty($_POST['name'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin'; 
    header('location:index.php');
    exit();
}

$name = $_POST['name'];

require_once '../../database/connect.php';

$sql = "insert into categories(name)
values(?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã thêm thành công';
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header('location:index.php');
    exit();
}


mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:index.php');