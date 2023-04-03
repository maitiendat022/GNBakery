<?php

require_once '../check_super_admin_signin.php';
if(empty($_POST['id'])) {
    $_SESSION['error'] = 'Không có dữ liệu để sửa!';
    header('location:index.php');
    exit();
}

$id = $_POST['id'];
if(empty($_POST['name'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin!';
    header("location:form_update.php?id=$id");
    exit();
}

$name = $_POST['name'];

require_once '../../database/connect.php';

$sql = "update categories
set name = ?
where id = '$id'";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 's', $name);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã sửa thành công';
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header("location:form_update.php?id=$id");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);


header("location:form_update.php?id=$id");