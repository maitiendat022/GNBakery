<?php

session_start();
if(empty($_SESSION['level']) || $_SESSION['level']==0) {
    $_SESSION['error'] = 'Bạn không đủ quyền để truy cập';
    header('location:../index.php');
    exit();
}