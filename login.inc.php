<?php
    if(isset($_POST["submit"])){
    require "dbh.inc.php";

    $username=$_POST["username"];
    $password=$_POST["password"];


    $query="SELECT * FROM users WHERE username=?";
    $stmt=mysqli_stmt_init($query);
    $stmt=mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($result)){
        $password_check=password_verify($password,$row["password"]);
        if($password_check==true){
            session_start();
            $_SESSION[userid]=$row["userid"];
            $_SESSION[username]=$row["username"];
            $_SESSION[email]=$row["email"];

            header("Location:../dashboard.php?login=success");
            exit();
        }
        else {
            header("Location:../index.php?error=wrongpassword");
            exit();
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
    
else{
    header("Location:../index.php");
    exit();
}

