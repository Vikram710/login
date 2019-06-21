<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="login.css" rel="stylesheet">
    </head>
    <body>
        <div class="form">
        <?php
            if(isset($_SESSION["userid"])){
                echo '<form action="includes/logout.inc.php" method="post">
                         <button type="submit" name="logout" >Log out</button>
                      </form>  

                ';
            }
            else {echo '<div class="logo"></div> <b>Sign in with your account</b><br><br>
                        <form action="includes/login.inc.php" method="post">
                            <label>Username</label><br>
                            <input type="username" name="username" placeholder="Username" required><br>
                            <label>Password</label><br>
                            <input type="password" name="password" placeholder="Password" required><br>
                            <button type="submit" name="submit">Log In</button><br>
                            Need an account? <a href="signup.php">Sign up </a>
                </form>';}
        ?>

        </div>
    </body>
</html>