<?php

session_start();
// empty kiểm tra trống, = 0
if(empty($_SESSION['level']) || $_SESSION['level'] != 1) {
    $_SESSION['error'] = 'Bạn không đủ quyền để truy cập';
    header('location:../root/index.php');
    exit();
}