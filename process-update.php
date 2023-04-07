<?php  
    session_start();
    if(empty($_SESSION['id'])){
        header('location:./signin.php');
        exit();
      }
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    require './database/connect.php';

    if($pass==""){
        $sql = "UPDATE users SET name='$name' ,address = '$address',phone = '$phone' WHERE id = '$id'";
        $result = mysqli_query($connect,$sql);
        $_SESSION['success'] = 'Cập nhật thông tin thành công';
        header("location: ./user.php");       
    }else{
        if(strlen($pass) < 6){
            $errorpass = "Password must be at least 6 characters long"; 
            header("location:update.php?errorpass=$errorpass");
        }else{
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name='$name',address = '$address',phone = '$phone',password = '$pass_hash' WHERE id = '$id'";
    
            $result = mysqli_query($connect,$sql);
            if(isset($result) > 0){
                $_SESSION['success'] = 'Cập nhật thông tin thành công';
                header("location: update.php");
            }else{
                header("location: update.php");
            }
        }
    }
    
?>