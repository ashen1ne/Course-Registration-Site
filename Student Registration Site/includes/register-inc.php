<?php
    // Check for form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $semester_id = $_POST["semester"];
        $course_id = $_POST["course"];
        
        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "students") or die("Connection failed: " . mysqli_connect_error());
        
        // Insert data into registrations table
        $sql = "INSERT INTO registrations (semester_id, course_id) VALUES ('$semester_id', '$course_id')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful.";
            header("location: ../registerCourse.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        // Close database connection
        mysqli_close($conn);
    }
?>
