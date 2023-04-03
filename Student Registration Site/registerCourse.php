<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
</head>

<body>
    <div>   
        <form class="menu" method="post" action="includes/register-inc.php">
        <p>Register for a course</p>
        <select style="width: 200px" name="semester" id="semester">
        <option value="">Select a Semester</option>
        <?php
            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "students") or die ("Failed connection do the DB");
            
            // Query semester table
            $results = mysqli_query($conn, "SELECT ID, name FROM semester;");
            
            // Check if query executed successfully
            if ($results) {
                // Generate option tags for each semester
                while ($row = mysqli_fetch_assoc($results)) {
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                }
            } 
            else {
                // Handle error
                echo "Error: " . mysqli_error($conn);
            }
            
            // Close database connection
            mysqli_close($conn);
        ?>
        </select>
        <br>
        <select style="width: 200px" name="course" id="course">
            <option value="">Select a Course</option>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "students") or die ("Failed connection do the DB");
                $results = mysqli_query($conn, "SELECT ID, name FROM courses;");
                if ($results) {
                    while ($row = mysqli_fetch_assoc($results)) {
                        echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";                }
                } 
                else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_close($conn);
            ?>
        </select>
        <br><br>
        <input type="submit" value="Register">        
        </form>
    </div> 

    <div>
        <p>Enrolled Courses</p>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "students") or die ("Failed connection do the DB");
            $sql = "SELECT registrations.id, registrations.semester_id, registrations.course_id FROM registrations;";
            $result = mysqli_query($conn, $sql);
            $resultCheck= mysqli_num_rows($result);

            if($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo $row['course_id'] . ' - ' . $row['semester_id'];
                    echo '<form method="post" action="includes/unenroll-inc.php">';
                    echo '<input type="hidden" name="registration_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" value="Delete">';
                    echo '</form>';
                    echo '<br>';
                }
            }
        ?>
</div>
</body>

</html>