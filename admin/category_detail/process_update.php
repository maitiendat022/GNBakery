<?php

require_once '../../check_super_admin_signin.php';
if(empty($_POST['id'])) {
    $_SESSION['error'] = 'Không có dữ liệu để sửa!';
    header('location:index.php');
    exit();
}

$id = $_POST['id'];
if(empty($_POST['name']) || $_POST['category']) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin!';
    header("location:form_update.php?id=$id");
    exit();
}

$name = $_POST['name'];
$category = $_POST['category'];

require_once '../../../database/connect.php';


$sql = "update category_detail
set name = ?,
category_id = ?
where id = '$id'";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'si', $name, $category);
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