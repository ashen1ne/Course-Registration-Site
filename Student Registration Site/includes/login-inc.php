<?php

if (isset($_POST["submit"])) {

    require_once 'dbh-inc.php';
    require_once 'function-inc.php';


    $email = $_POST["email"];
    $pwd= $_POST["pwd"];

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput"); //redirect to login page
        exit (); //stops script from running
    }

    loginUser ($conn, $email, $pwd);
}

else {
    header("location: ../login.php");
    exit();
}