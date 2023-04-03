<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <div class="signup-form">
        <h2>Sign Up</h2>
        <form action="includes/signup-inc.php" method="post">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="email" name="email" placeholder="E-Mail"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
        <button type="submit" name="submit"> Sign Up</button>
        </form>
    </div>

    <?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "<p>Input all fields</p>";
        }
        else if($_GET["error"] == "passwordmismatch") {
            echo "<p>Passwords do not match</p>";
        }
        else if($_GET["error"] == "emailtaken") {
            echo "<p>Email is already registered</p>";
        }
        else if($_GET["error"] == "none") {
            echo "<p>You have successfully signed up!</p>";
        }
    }
    ?>
</body>
</html>