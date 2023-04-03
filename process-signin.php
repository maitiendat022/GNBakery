<?php
    session_start();
    if(isset($_POST['btnSignin'])){
        $email = $_POST['email'];
        $pass = $_POST['password']; 
        require './database/connect.php';

        $sql = "SELECT * FROM users where email = '$email'";
        $result = mysqli_query($connect,$sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $name = $row['name'];
            $pass_hash = $row['password'];
            if(password_verify($pass,$pass_hash)){
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                header("location:index.php");
            }else{
                $error = "Incorrect account or password ";
                header("location:signin.php?error=$error");
            }
        }
        else{
            $error = "Incorrect account or password ";
            header("location:signin.php?error=$error");
        }
    }else{
        header("location: signin.php");
    }
    
?>