<?php
session_start();
if(!isset($_SESSION['id'])) {
    $error = "Vui Lòng Đăng Nhập để thêm bánh ";
    header("location:signin.php?error=$error");

}?>

    
