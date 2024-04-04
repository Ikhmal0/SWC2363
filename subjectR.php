<!DOCTYPE html>
<html lang="en">
<head>

<style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 50px solid #f1f1f1;}

            input[type=text]{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }   

            button {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            a.Cancel {
                padding: 15px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }

            
            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
        </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>
<?php
// Call file to connect server eleave
include("header.php");

// This query inserts a record in the eLeave table
// Has form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array(); // Initialize an error array

    // Check for a studentID
    if (empty($_POST['studentID'])) {
        $error[] = 'You forgot to enter your student ID.';
    } else {
        $id = mysqli_real_escape_string($connect, trim($_POST['studentID']));
    }

    // Check for a subjectCode
    if (empty($_POST['subjectCode'])) {
        $error[] = 'You forgot to enter your subject code.';
    } else {
        $sc = mysqli_real_escape_string($connect, trim($_POST['subjectCode']));
    }

    // Check for a courseCode
    if (empty($_POST['courseCode'])) {
        $error[] = 'You forgot to enter your course code.';
    } else {
        $cc = mysqli_real_escape_string($connect, trim($_POST['courseCode']));
    }

    // Register the subject in the database
    // Make the query
    $q = "INSERT INTO subject (studentID, subjectName, subjectCode, courseCode, credit) VALUES ('$id', '', '$sc', '$cc', '')";
    $result = mysqli_query($connect, $q); // Run the query

    if ($result) { // If it runs
        echo '<h1>Thank you</h1>';
        exit();
    } else { // If it didn't run
        // Message
        echo '<h1>System error</h1>';
        // Debugging message
        echo '<p>' . mysqli_error($connect) . '<br><br>Query: ' . $q . '</p>';
    }
    mysqli_close($connect); // Close the database connection
    exit();
} // End of the main submit conditional
?>


    
    
    <form action="studentPortal.php" method="post">
    <div class="container">
            <h2>Register Subject</h2>
       
            <label for="studentID">Student ID:</label>
            <input type="text" id="studentID" name="studentID" size="30" maxlength="50" required
            value="<?php if (isset($_POST['studentID'])) echo $_POST['studentID'];?>">
        
            <label for="subjectCode">Subject Code:</label>
            <input type="text" id="subjectCode" name="subjectCode" size="30" maxlength="50" required
            value="<?php if (isset($_POST['subjectCode'])) echo $_POST['subjectCode'];?>">
        
            <label for="courseCode">Course Code:</label>
            <input type="text" id="courseCode" name="courseCode" size="30" maxlength="50" required
            value="<?php if (isset($_POST['courseCode'])) echo $_POST['courseCode'];?>">
        
            <button type="submit">Register</button>
            <button type="reset" style="background-color:white; color:black">Reset</button>

        </div>
        <div class="container" style="background-color:#f1f1f1">
            <a class="Cancel" href="studentPortal.php" style="background-color:red; color=#f1f1f1">Cancel</a>
        </div>
    </form>
</body>
</html>
