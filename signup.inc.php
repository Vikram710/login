<?php

    if(isset($_POST["submit"])){
        require "dbh.inc.php";

        $username=$_POST["username"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
        $hashed_password=password_hash($password,PASSWORD_DEFAULT);

        //confirm passowrd
         if($password!==$confirm_password){
            header("Location:../signup.php?error=passwordnotmatch&username=".$username."&email=".$email);
            exit();
        }
        else{
                    $query="INSERT INTO users(username,email,password) VALUES(?,?,?) ";
                    $stmt=mysqli_prepare($conn, $query);
        
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashed_password);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
        }
    }

    else{
        header("Location:../signup.php");
        exit();
    }





  