<?php
session_start();
$user_id = $_POST['user_id'];
if(empty($_POST['name']) || empty($_POST['user_id']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['gender']) || empty($_POST['birthday']) || empty($_POST['admin_id'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header("location:form_update.php?id=$user_id");
    exit();
};
$name = $_POST['name'];

$phone = $_POST['phone'];
$address = $_POST['address'];
$gender= $_POST['gender'];
$birthday = $_POST['birthday'];
$admin_id = $_POST['admin_id'];
$level = 2;
require_once '../../database/connect.php';
     
$sql = "update users set name = '$name', phone = '$phone', address = '$address', gender = '$gender', birthday = '$birthday' where id = '$user_id'";
$result = mysqli_query($connect,$sql); 


if(isset($result) >0){
    $_SESSION['success'] = 'Đã sửa thành công';
    
    header("location:form_update.php?id=$user_id");
    exit();
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    
    header("location:form_update.php?id=$user_id");
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:form_insert.php');