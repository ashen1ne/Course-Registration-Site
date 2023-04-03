<?php

function emptyInputSignup($name, $email, $pwd, $pwdrepeat) {
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        $result = TRUE;
    }
    else {
        $result = FALSE;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = TRUE;
    }
    else {
        $result = FALSE;
    }
    return $result;
}

function emailexists($conn, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); //prepared statement to prevent users from inputing code and altering database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit ();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); //prepared statement to prevent users from inputing code and altering database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit ();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit ();
}

function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = TRUE;
    }
    else {
        $result = FALSE;
    }
    return $result;
}

function loginUser($conn, $email, $pwd) {
    $emailExists = emailexists($conn, $email);

    if ($emailExists === false) {
        header("location: ../login.php?error=userdoesnotexist"); //redirect to login page
        exit (); //stops script from running
    } 

    $pwdHashed = $emailExists["usersPwd"]; 
    $checkpwd = password_verify($pwd, $pwdHashed);
    
    if ($checkpwd === false) {
        header("location: ../login.php?error=wronglogin"); 
        exit ();
    }
    else if ($checkpwd === true) {
        session_start();
        $_SESSION["usersID"] = $emailExists["usersName"];
        header("location: ../index.php"); //redirect to login page
        exit (); //stops script from running
    }
}