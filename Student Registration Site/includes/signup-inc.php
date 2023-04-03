<?php

// check if user signs-up using submit button
if (isset($_POST["submit"])) {

    require_once 'dbh-inc.php';
    require_once 'function-inc.php';


    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd= $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];   

//error handling
    if (emptyInputSignup($name, $email, $pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=emptyinput"); //redirect to signup page
        exit (); //stops script from running
    }

    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../signup.php?error=passwordmismatch");
        exit ();
    }

    if (emailexists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit ();
    }
    
    createUser($conn, $name, $email, $pwd);
}

else {
    header("location: ../signup.php");
    exit();
}
