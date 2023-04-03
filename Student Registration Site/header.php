<?php
    session_start();
    echo $_SESSION["usersID"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Course Registration</title>
	<link rel="stylesheet" href="css/style.css">
</head>

	<div class="topnav">
		<p>Student Course Registration</p>
        <?php
            if(isset($_SESSION["usersID"])) {
                echo "<a href='includes/logout-inc.php'>Logout</a>";
                echo "<a href='registerCourse.php'>Courses</a>";
                echo "<a class='active' href='index.php'>Home</a>";
            }
            else {
                echo "<a href='login.php'>Login</a>";                
                echo "<a href='signup.php'>Sign Up</a>";
                echo "<a href=''>Contact Us</a>";
                echo "<a class='active' href='index.php'>Home</a>";
            }
        ?>
	</div>