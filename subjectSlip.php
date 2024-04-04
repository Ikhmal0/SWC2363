<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Slip</title>
</head>
<body>
    <h1>Subject Slip</h1>

    <?php
    // Include file to connect to the database
    include("header.php");

    // Fetch student information from the database
    $student_id = 222; // Example student ID (you can retrieve this dynamically)
    $query = "SELECT studentName, subjectID FROM student WHERE studentID = $student_id";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        // Display student information
        echo "<h2>Welcome, {$student['studentName']}!</h2>";
        echo "<p>Your subject slip:</p>";
        // Generate and display subject slip content
        echo "<p>Subject : {$student['subjectID']}</p>";
        
        // Add more subjects as needed
    } else {
        echo "<p>No subject slip found for this student.</p>";
    }

    // Close database connect
    mysqli_close($connect);
    ?>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
