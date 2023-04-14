<?php  
    session_start();
    if(empty($_SESSION['id'])){
        header('location:./signin.php');
        exit();
      }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    require './database/connect.php';

    $sql = "UPDATE users SET name='$name' ,address = '$address',phone = '$phone' WHERE id = '$id'";
    $result = mysqli_query($connect,$sql);
    $_SESSION['success'] = 'Cập nhật thông tin thành công';
    header("location: ./user.php");       
    
    
?>