
<html>
    <head>
        <title>eLeave Management System</title>
    </head>

<body>
<?php
// Call file to connect server eleave
include("header.php");

// Function to add a new subject
function addSubject()
{
    global $connect;

    // Get input data
    $n = mysqli_real_escape_string($connect, trim($_POST['subjectName']));
    $sc = mysqli_real_escape_string($connect, trim($_POST['subjectCode']));
    $cc = mysqli_real_escape_string($connect, trim($_POST['courseCode']));
    $c = mysqli_real_escape_string($connect, trim($_POST['credit']));

    // SQL query for insertion
    $q = "INSERT INTO subject (subjectName, subjectCode, courseCode, credit) VALUES ('$n', '$sc', '$cc', '$c')";

    // Run the query
    $result = mysqli_query($connect, $q);

    if ($result && mysqli_insert_id($connect) > 0) {
        echo '<script>alert("The user has been added"); window.location.href="subjectList.php";</script>';
    } else {
        echo '<p class="error">Error: ' . mysqli_error($connect) . '</p>';
    }
}

// Call the function to add a new subject if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addSubject();
}

// Fetching subject details for updating
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $q = "SELECT subjectName, subjectCode, credit FROM subject WHERE subjectCode = $id";
    $result = mysqli_query($connect, $q);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        $subjectName = $row[0];
        $subjectCode = $row[1];
        $courseCode = $row[2];
        $credit = $row[3];
    } else {
        echo '<p class="error">Subject not found.</p>';
    }
} else {
    echo '<p class="error">Subject Code not provided.</p>';
}

mysqli_close($connect); // Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>eLeave Management System</title>
</head>
<body>
    <h2>Add New Subject</h2>

    <form method="post" action="">
        <label for="subjectName">Subject Name:</label>
        <input type="text" id="subjectName" name="subjectName" size="30" maxlength="50" value="<?php echo isset($subjectName) ? $subjectName : ''; ?>" required><br><br>

        <label for="subjectCode">Subject Code:</label>
        <input type="text" id="subjectCode" name="subjectCode" size="15" maxlength="20" value="<?php echo isset($subjectCode) ? $subjectCode : ''; ?>" required><br><br>

        <label for="courseCode">Course Code:</label>
        <input type="text" id="courseCode" name="courseCode" size="15" maxlength="20" value="<?php echo isset($courseCode) ? $courseCode : ''; ?>" required><br><br>

        <label for="credit">Credit:</label>
        <input type="text" id="credit" name="credit" size="30" maxlength="50" value="<?php echo isset($credit) ? $credit : ''; ?>" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>



</body>
</html>