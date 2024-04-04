<html>
    <head>
        <title>eLeave Management System</title>
    </head>

    <?php
    //call file to connect server eLeave
    include ("header.php");
    ?>
    <h2> List of Subject </h2>

    <?php
    //make the query
    $q = "SELECT subjectID, subjectName, subjectCode, courseCode, credit 
FROM subject
ORDER BY subjectID";

    //run the query and assing it to the variable $result
    $result = @mysqli_query ($connect, $q);

    if ($result)
    {
        //Table heading
        echo '<table border ="2">
        <tr>
        <td align="center"><strong>ID</strong></td>
        <td align="center"><strong>NAME</strong></td>
        <td align="center"><strong>CODE</strong></td>
        <td align="center"><strong>COURSE</strong></td>
        <td align="center"><strong>credit</strong></td>
        <td align="center"><strong>UPDATE</strong></td>
        <td align="center"><strong>DELETE</strong></td>
        </tr>';

        //Fetch and print all the records
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<tr>
            <td>'.$row['subjectID'].'</td>
            <td>'.$row['subjectName'].'</td>
            <td>'.$row['subjectCode'].'</td>
            <td>'.$row['courseCode'].'</td>
            <td>'.$row['credit'].'</td>
            <td align="center"><a href="subjectUpdate.php?id='.$row['subjectID'].'">Update</a></td>
            <td align="center"><a href="subjectDelete.php?id='.$row['subjectID'].'">Delete</a></td>
            </tr>';
        }
        //close the table
        echo '</table>';
        echo '<a href="addSubject.php">Add Subject</a>';

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

<
</div>
</div>
</body>
</html>