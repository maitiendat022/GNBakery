<?php
    session_start();
    if(isset($_POST['btnSignin'])){
        $email = $_POST['email'];
        $pass = $_POST['password']; 
        
        require '../database/connect.php';
        $sql = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $status = $row['status'];
            $level = $row['level'];
            if($row['status']==0 && $level== 2 ){
                $_SESSION['error'] = "Tài khoản của bạn đã bị khóa";
                header("location:index.php");
            }else{
                $id = $row['id'];
                $name = $row['name'];
                $pass_hash = $row['password'];
                if(password_verify($pass,$pass_hash)){
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $name;
                    $_SESSION['level'] = $level;
                    $_SESSION['image'] = 'adminvjppro.jpg';
                    header("location:./root/index.php");
                }else{
                    $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
                    header("location:index.php");
                }
            }
        }
        else{
            $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu";
            header("location:index.php");
        }
    }else{
        header("location:index.php");
    }
    
?>