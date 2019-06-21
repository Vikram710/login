<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="dashboard.css" rel="stylesheet">
    </head>
    <body><?php
    require "includes/dbh.inc.php";
    $sum=0;
    if(isset($_SESSION["userid"])){
        if(isset($_POST["delete"])){
            $key=$_POST["keyd"];
            $deletequery="DELETE FROM manager WHERE id=".$key."";
            mysqli_query($conn, $deletequery);
            }

        echo' <a name="home"></a>
        <div class="main">
            <nav>
                <div class="logo">WALLET MANAGER</div>

                <ul class="menu-area">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="form">
                    <form action="includes/logout.inc.php" method="post">
                        <button type="submit" name="logout" >Log out</button>
                    </form>
                </div>
            </nav>

        </div><br><br><br><br><br>
        <p>Welcome Mr.'. $_SESSION["username"].'</p>

        <form action="includes/dash.inc.php" method="post">
            <input type="text" name="title" placeholder="Title" required><br>
            <input type="text" name="details" placeholder="Description" required><br>
            <input type="number" name="expenses" placeholder="Expenses" required><br>
            <button name="submit" class="hi">Add</button></form>';
            

            $query="SELECT * FROM manager";
            $stmt=mysqli_prepare($conn, $query);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);

            echo'<table >
                <tr>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Expenses</th>
                    <th class="tb">Date of purchase</th>
                    <th>Delete</th>
                </tr>';

            while($record=mysqli_fetch_assoc($result)){
                if($record["username"]==$_SESSION["username"]){
                $sum+=$record["expenses"];
                echo'<tr>
                    <td>'.$record["title"].' </td>
                    <td>'.$record["details"]. '</td>
                    <td> Rs '.$record["expenses"]. '</td>
                    <td>'.$record["date"].'</td>
                    <td><form action="dashboard.php" method="post" class="hey"> 
                    <input type="checkbox" name="keyd" value='.$record["id"].' required>
                    <button name="delete" >Delete</button>
                    </form> </td>
                    </tr>';
                }        
            }
            echo'<table> <br> ';
            echo '<p>Total Expense is Rs '.$sum.'</p>';
            
            
            



        
        
        echo'<div class="bottom">
            <div class="about"><h2>About</h2><a name="about"></a>This is a wallet manager web application.
            </div>
            <div class="services"><h2>Services</h2><a name="services"></a>You can add your new expenses,view them and also delete them.
            </div>
            <div class="contact"><h2>Contact</h2><a name="contact"></a>vikram710v@gmail.com<br>9962447541
            </div>  
        </div>';}

    

        else { 
                echo'Login in with your account to access this page';
            }
        ?>

    </body>
</html>


