<?php
    session_start();
    if(isset($_POST['btnSignin'])){
        $email = $_POST['email'];
        $pass = $_POST['password']; 
        require './database/connect.php';

        $sql = "SELECT * FROM users where email = '$email' and level = 0";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $status = $row['status'];
            if($status==0){
                $error = "Tài khoản của bạn đã bị khóa";
                header("location:signin.php?error=$error");
            }else{
                $id = $row['id'];
                $pass_hash = $row['password'];
                if(password_verify($pass,$pass_hash)){
                    $_SESSION['id'] = $id;
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    header("location:index.php");
                }else{
                    $error = "Tài khoản hoặc mật khẩu chưa chính xác ";
                    header("location:signin.php?error=$error");
            }
            }
        }
        else{
            $error = "Tài khoản hoặc mật khẩu chưa chính xác";
            header("location:signin.php?error=$error");
        }
    }else{
        header("location: signin.php");
    }
    
?>