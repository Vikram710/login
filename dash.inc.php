<?php
session_start();

    if(isset($_POST["submit"]) && isset($_SESSION["userid"])){
        require "dbh.inc.php";
        

        $title=$_POST["title"];
        $details=$_POST["details"];
        $expenses=$_POST["expenses"];
        $username=$_SESSION["username"];
        $date= date("Y-m-d");
       

        $query="INSERT INTO manager(
            title, details, expenses,username,date) VALUES(?,?,?,?,?)
        ";

        $stmt=mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt,"ssdss",$title,$details,$expenses,$username,$date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("Location:../dashboard.php");
    }

    else{
        header("Location:../index.php");
        exit();
    }
