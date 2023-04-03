<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    
    <div class="signup-form">
        <h2>Login</h2>
        <form action="includes/login-inc.php" method="post">
        <input type="email" name="email" placeholder="E-Mail"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <button type="submit" name="submit"> Log In</button>
        </form>
    </div>

    <?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "wronglogin") {
            echo "<p>Login does not match username or password. </p>";
        }
        else if($_GET["error"] == "userdoesnotexist") {
            echo "<p>User does not exist</p>";
        }
    }
    ?>
</body>
</html>