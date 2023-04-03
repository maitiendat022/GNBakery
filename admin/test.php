<?php


$name = 'admin';
$email = 'admin@gmail.com';
$password = 'adminvjppro';
$phone = "0986971670";
$address = "Phú Xuyên - Hà Nội";
$level = 1;

require_once '../database/connect.php';

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into users(name, email, password, phone, address, level)
values(?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($connect, $sql);
if($stmt) {
    mysqli_stmt_bind_param($stmt, 'sssssi', $name, $email, $password_hash, $phone, $address, $level);
    mysqli_stmt_execute($stmt);
}
else {
    $_SESSION['error'] = 'Không thể chuẩn bị truy vấn!';
}


mysqli_stmt_close($stmt);
mysqli_close($connect);
