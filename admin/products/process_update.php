<?php

require_once '../check_admin_signin.php';

if(empty($_POST['id']) || empty($_POST['admin_id'])) {
    $_SESSION['error'] = 'Không có dữ liệu để sửa!';
    header('location:index.php');
    exit();
}

if(empty($_POST['name']) || empty($_POST['size']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['image_old'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:form_update.php?id=' . $_POST['id'] . '&admin_id=' . $_POST['admin_id']);
    exit();
}

$id = $_POST['id'];
$admin_id = $_POST['admin_id'];
$name = $_POST['name'];
$size = $_POST['size'];
$price = $_POST['price'];
$image_old = $_POST['image_old'];
$image_new = $_FILES['image_new'];
$description = $_POST['description'];
$category = $_POST['category'];

if($image_new['size'] > 0) {
    $folder = '../../assets/images/products/';
    $path = $image_new['name'];
    $file_extension = pathinfo($path, PATHINFO_EXTENSION);
    $file_name = 'cake_' . time() . '.' . $file_extension; 
    $path_file = $folder . $file_name;

    move_uploaded_file($image_new['tmp_name'], $path_file);
}
else {
    $file_name = $image_old;
}

require_once '../../database/connect.php';

$sql = "update products
set name = ?,
image = ?,
size = ?,
price = ?,
description = ?,
category_detail_id = ?
where id = '$id' and user_id = '$admin_id'";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssiisi', $name, $file_name, $size, $price, $description, $category);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã sửa thành công';

}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    header("location:form_update.php?id=$id&admin_id=$admin_id");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

header("location:form_update.php?id=$id&admin_id=$admin_id");