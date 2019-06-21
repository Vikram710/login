<?php
session_start();
?>

<html>
    <head>
        <title>php</title>
        <link href="signup.css" rel="stylesheet">
    </head>
    <body>
        <div class="form">
        <div class="logo"></div>Please fill in this form to create an account!<br><br>
            <form action="includes/signup.inc.php" method="post">
                <input type="username" name="username" placeholder="Username" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="password" name="confirm_password" placeholder="Confirm password" required><br>
                <button type="submit" name="submit">Sign up</button><br>
            </form>
        </div>
    </body>
</html>