<?php
session_start();
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['gender']) || empty($_POST['birthday']) || empty($_POST['admin_id'])) {
    $_SESSION['error'] = 'Phải điền đầy đủ thông tin';
    header('location:form_insert.php');
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender= $_POST['gender'];
$birthday = $_POST['birthday'];
$admin_id = $_POST['admin_id'];
$level = 2;
require_once '../../database/connect.php';
$sqlEmail = "SELECT * FROM users WHERE email = '$email' and level = 2";
$resultEmail = mysqli_query($connect,$sqlEmail);
if(mysqli_num_rows($resultEmail) > 0){
    $_SESSION['error'] = 'Email đã tồn tại'; 
    header('location:form_insert.php');
    exit();
}
if(strlen($password) < 6){
    $_SESSION['error'] = 'Mật khẩu phải dài hơn 6 kí tự'; 
    header('location:form_insert.php');
}          
$pass_hash = password_hash($password, PASSWORD_DEFAULT);
       
$sql = "insert into users(name, email, password, phone, address, gender, birthday, level)
values(?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssssssi', $name, $email, $pass_hash, $phone, $address, $gender, $birthday, $level);
    mysqli_stmt_execute($stmt);

    $_SESSION['success'] = 'Đã thêm thành công';
    die($_SESSION['success']);
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
    die($_SESSION['error']);
    header('location:form_insert.php');
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

header('location:form_insert.php');