<?php
    session_start();
    if(empty($_SESSION['id'])){
        header('location:./signin.php');
        exit();
    }
    
    if(empty($_POST['old-password']) || empty($_POST['new-password']) || empty($_POST['confirm-password'])) {
        $error = 'Vui lòng điển đầy đủ thông tin';
        header("location:update.php?error=$error");
        exit;
    }
    $id = $_SESSION['id'];
    $old_password = $_POST['old-password'];
    
    require './database/connect.php';

    $sql = "SELECT * FROM users where id = $id";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $pass_hash = $row['password'];
      if(password_verify($old_password,$pass_hash)){
        $new_password = $_POST['new-password'];
        $confirm_password = $_POST['confirm-password'];
        if(strlen($new_password)<6){
          $error = 'Mật khẩu phải dài hơn 6 kí tự';
          header("location:update.php?error=$error");
        }else if($new_password != $confirm_password){
          $error = 'Mật khẩu không trùng khớp.';
          header("location:update.php?error=$error");
        }else{
          $pass_hash_new = password_hash($new_password, PASSWORD_DEFAULT);
          $sqlUpdate = "UPDATE users Set password = '$pass_hash_new'";
          mysqli_query($connect,$sqlUpdate);
          $_SESSION['success'] = 'Đổi mật khẩu thành công';
          header("location:update.php");
        }
      }else{
        $error = 'Mật khẩu cũ chưa chính xác';
        header("location:update.php?error=$error");
      }
    }
    
        
        
?>