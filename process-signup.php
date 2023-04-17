<?php
    
        $email= $_POST['email'];
        $name = $_POST['name'];
        $pass = $_POST['password'];
        require './database/connect.php';

        $sqlEmail = "SELECT * FROM users WHERE email = '$email' and level = 0 ";
        $resultEmail = mysqli_query($connect,$sqlEmail);
        if(mysqli_num_rows($resultEmail) > 0){
            $error = "Email đã tồn tại"; 
            header("location:signup.php?error=$error");
        }else{
            if(strlen($pass) < 6){
                $errorpass = "Mật khẩu tối thiểu 6 kí tự"; 
                header("location:signup.php?errorpass=$errorpass");
            }else{
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                $sqlInsert="INSERT INTO users(name,email,password,level) VALUES('$name','$email','$pass_hash',0)";
        
                $resultInsert = mysqli_query($connect,$sqlInsert);
                if(isset($resultInsert) > 0){
                    $success = "Bạn đã đăng ký thành công. Đăng nhập tại đây"; 
                    header("location: signin.php?success=$success");
                }else{
                    $errorpass = "Registration failed";
                    header("location: signup.php?errorpass=$errorpass");
                }
            }
        }
        mysqli_close($connect);
    
?>