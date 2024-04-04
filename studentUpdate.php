<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eLeave Management System</title>
</head>
<body>
    <?php
    // Call file to connect to the database
    include("header.php");

    // Look for a valid user id, either through GET or POST
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
        $id = $_GET['id'];
    } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
        $id = $_POST['id'];
    } else {
        echo '<p class="error">This page has been accessed in error.</p>';
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = array();

        // Look for studentName
        if (empty($_POST['studentName'])) {
            $error[] = 'You forgot to enter your name.';
        } else {
            $n = mysqli_real_escape_string($connect, $_POST['studentName']);
        }

        // Look for studentIC
        if (empty($_POST['studentIC'])) {
            $error[] = 'You forgot to enter your IC.';
        } else {
            $ic = mysqli_real_escape_string($connect, $_POST['studentIC']);
        }

        // Look for courseCode
        if (empty($_POST['courseCode'])) {
            $error[] = 'You forgot to enter your Course Code.';
        } else {
            $cc = mysqli_real_escape_string($connect, $_POST['courseCode']);
        }

        // Look for studentPhoneNo
        if (empty($_POST['studentPhoneNo'])) {
            $error[] = 'You forgot to enter your phone number.';
        } else {
            $ph = mysqli_real_escape_string($connect, $_POST['studentPhoneNo']);
        }

        // Look for studentEmail
        if (empty($_POST['studentEmail'])) {
            $error[] = 'You forgot to enter your email.';
        } else {
            $e = mysqli_real_escape_string($connect, $_POST['studentEmail']);
        }

        // Look for studentAddress
        if (empty($_POST['studentAddress'])) {
            $error[] = 'You forgot to enter your address.';
        } else {
            $sa = mysqli_real_escape_string($connect, $_POST['studentAddress']);
        }

        // If no problem occurred
        if (empty($error)) {
            $q = "SELECT studentID FROM student WHERE studentName = '$n' AND studentID != $id";

            $result = mysqli_query($connect, $q);

            if (mysqli_num_rows($result) == 0) {
                $q = "UPDATE student SET studentName = '$n', studentIC = '$ic', courseCode = '$cc', studentPhoneNo = '$ph',
                    studentEmail = '$e', studentAddress = '$sa' WHERE studentID = $id";

                $result = mysqli_query($connect, $q);

                if ($result && mysqli_affected_rows($connect) == 1) {
                    echo '<script>alert("The user has been edited"); window.location.href="studentList.php";</script>';
                } else {
                    echo '<p class="error">The user has not been edited due to a system error. We apologize for any inconvenience.</p>';
                    echo '<p>' . mysqli_error($connect) . '<br/> Query: ' . $q . '</p>';
                }
            } else {
                echo '<p class="error">The ID has already been registered.</p>';
            }
        } else {
            echo '<p class="error">The following error(s) occurred:<br/>';
            foreach ($error as $msg) {
                echo "- $msg<br/>\n";
            }
            echo '</p><p>Please try again.</p>';
        }
    }

    $q = "SELECT studentName, studentIC, courseCode, studentPhoneNo, studentEmail, studentAddress FROM student WHERE studentID = $id";

    $result = mysqli_query($connect, $q);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_NUM);

        echo '<h2>Edit Student Record</h2>
            <form action="studentUpdate.php" method="post">
            <p><label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" size="30" maxlength="50" value="' . $row[0] . '"></p>
            
            <p><label for="studentIC">IC:</label>
            <input type="text" id="studentIC" name="studentIC" size="15" maxlength="20" value="' . $row[1] . '"></p>
            
            <p><label for="courseCode">Course Code:</label>
            <input type="text" id="courseCode" name="courseCode" size="30" maxlength="50" value="' . $row[2] . '"></p>
            
            <p><label for="studentPhoneNo">Phone No.:</label>
            <input type="text" id="studentPhoneNo" name="studentPhoneNo" size="15" maxlength="20" value="' . $row[3] . '"></p>
            
            <p><label for="studentEmail">Student Email:</label>
            <input type="text" id="studentEmail" name="studentEmail" size="30" maxlength="50" value="' . $row[4] . '"></p>
            
            <p><label for="studentAddress">Student Address:</label>
            <input type="text" id="studentAddress" name="studentAddress" size="30" maxlength="50" value="' . $row[5] . '"></p>
            
            <p><input type="submit" name="submit" value="Update"></p>
            <input type="hidden" name="id" value="' . $id . '"/>
            </form>';
    } else {
        echo '<p class="error">This page has been accessed in error</p>';
    }

    mysqli_close($connect);
    ?>
</body>
</html>
