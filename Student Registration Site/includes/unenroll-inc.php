<?php
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "students") or die ("Failed connection to the DB");

    // Get registration ID from POST request
    $registration_id = $_POST['registration_id'];

    // Delete registration from database
    $sql = "DELETE FROM registrations WHERE id = $registration_id;";
    $result = mysqli_query($conn, $sql);

    // Handle result of delete query
    if ($result) {
        // Redirect back to registerCourse.php
        header("Location: ../registerCourse.php?unenroll=success");
        exit();
    } 
    else {
        // Handle error
        echo "Error deleting registration: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
