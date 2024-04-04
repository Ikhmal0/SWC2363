<html>
    <head>
        <title>eLeave Management System</title>
    </head>

    <?php
    //call file to connect server eLeave
    include ("header.php");
    ?>
    <h2> List of Student </h2>

    <?php
    //make the query
    $q = "SELECT studentID, studentPassword, studentName,studentIC, courseCode, studentPhoneNo, studentEmail, studentAddress,subjectID
    FROM student
    ORDER BY studentID";

    //run the query and assing it to the variable $result
    $result = @mysqli_query ($connect, $q);

    if ($result)
    {
        //Table heading
        echo '<table border ="2">
        <tr>
        <td align="center"><strong>ID</strong></td>
        <td align="center"><strong>NAME</strong></td>
        <td align="center"><strong>IC</strong></td>
        <td align="center"><strong>COURSE CODE</strong></td>
        <td align="center"><strong>PHONE NO.</strong></td>
        <td align="center"><strong>EMAIL</strong></td>
        <td align="center"><strong>ADDRESS</strong></td>
        <td align="center"><strong>SUBJECT</strong></td>
        <td align="center"><strong>UPDATE</strong></td>
        <td align="center"><strong>DELETE</strong></td>
        </tr>';

        //Fetch and print all the records
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row['studentID'].'</td>
            <td>'.$row['studentName'].'</td>
            <td>'.$row['studentIC'].'</td>
            <td>'.$row['courseCode'].'</td>
            <td>'.$row['studentPhoneNo'].'</td>
            <td>'.$row['studentEmail'].'</td>
            <td>'.$row['studentAddress'].'</td>
            <td>'.$row['subjectID'].'</td>
            <td align="center"><a href="studentUpdate.php?id='.$row['studentID'].'">Update</a></td>
            <td align="center"><a href="studentDelete.php?id='.$row['studentID'].'">Delete</a></td>
            </tr>';
        }
        //close the table
        echo '</table>';

        //free up the resources
        mysqli_free_result ($result);
        //if faild to run
    }
    else
    {
        //error message
        echo '<p class ="error"> The current user could not be retrieved.
        We apologize for any inconvenience.</p>';

        //debugging message
        echo '<p>'.mysqli_error ($connect).'<br><br/>Query:'.$q.'</p>';
    } //end of if ($result)
    //close the datebase connection
    mysqli_close($connect);
?>
</div>
</div>
</body>
</html>