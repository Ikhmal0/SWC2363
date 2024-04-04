<html>
    <head>
        <title>eLeave Management System</title>
    </head>

    <body>
        <?php
        //call file to connect server eleave
        include ("header.php");
        ?>

        <h2> Edit User Record</h2>

        <?php
        //look for a valid subject id, either through GET or POST
        if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
        {
            $id = $_GET['id'];
        }
        else if ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
        {
            $id = $_POST['id'];
        }
        else
        {
            echo '<p class ="error">This page has been accessed in error.</p>';
            exit();
        }

        if ($_SERVER['REQUEST_METHOD']== 'POST')
        {
            $error = array ();//initialize an error array

            //check for a subjectName
            if (empty ($_POST ['subjectName']))
            {
                $error [] = 'You forgot to enter your name.';
            }
            else
            {
                $n = mysqli_real_escape_string ($connect, trim ($_POST ['subjectName']));
            }

            //check for a subjectCode
            if (empty ($_POST ['subjectCode']))
            {
                $error [] = 'You forgot to enter your phone number.';
            }
            else
            {
                $sc = mysqli_real_escape_string ($connect, trim ($_POST ['subjectCode']));
            }

            //check for a courseCode
            if (empty ($_POST ['courseCode']))
            {
                $error [] = 'You forgot to enter your email.';
            }
            else
            {
                $cc = mysqli_real_escape_string ($connect, trim ($_POST ['courseCode']));
            }
            //check for a credit
            if (empty ($_POST ['credit']))
            {
                $error [] = 'You forgot to enter your address.';
            }
            else
            {
                $c = mysqli_real_escape_string ($connect, trim ($_POST ['credit']));
            }
            

            //if no problem occured
            if (empty($error))
            {
                $q = "SELECT subjectID FROM subject WHERE subjectName= '$n' AND subjectID != $id";

                $result = @mysqli_query ($connect, $q);//run the query

                if (mysqli_num_rows($result) == 0)
                {
                    $q ="UPDATE subject SET subjectName ='$n', subjectCode ='$sc', courseCode ='$cc',
                    credit='$c'
                     WHERE subjectID ='$id' LIMIT 1";

                    $result = @mysqli_query ($connect, $q);//run the query

                    if (mysqli_affected_rows($connect) == 1)
                    {
                        echo '<script>alert ("The subject has been edited");
                        window.location.href="subjectList.php";</script>';
                    }
                    else
                    {
                        echo '<p class ="error"> The subject has not been edited due to the system error.
                        We apologize for any inconvenience.</p>';
                        echo '<p>'.mysqli_error($connect).'<br/> query:'.$q.'</p>';
                    }   
                }
                else
                {
                    echo '<p class ="error">The id had been registered <p/>';
                }
            }
            else
            {
                echo '<p class ="error">The following error (s) occured: <br/>';
                foreach ($error as $msg)
                {
                    echo "-msg<br>\n";
                }
                echo '<p><p>Please try again.<p>';
            }
        }

        $q = "SELECT subjectName,subjectCode, courseCode,
            credit
             FROM subject WHERE subjectID = $id";

        $result = @mysqli_query ($connect, $q);//run the query

        if (mysqli_num_rows($result) ==1)
        {
            //get subject information
            $row =mysqli_fetch_array($result, MYSQLI_NUM);

            //create the form
            echo '<form action="subjectUpdate.php" method ="post">
            <p><label class ="label" for="subjectName">subject Name*:</label>
            <input type="text" id="subjectName" name="subjectName" size ="30"
            maxlength="50" value="'.$row[0].'"></p>
        
            <p><br><label class ="label" for="subjectCode">Phone No.*:</label>
            <input type="text" id="subjectCode" name="subjectCode" size ="30"
            maxlength="50" value="'.$row[1].'"></p>
        
            <p><br><label class ="label" for="courseCode">subject Email*:</label>
            <input type="text" id="courseCode" name="courseCode" size ="30"
            maxlength="50" value="'.$row[2].'"></p>

            <p><br><label class ="label" for="credit">Employee Address:</label>
            <input type="text" id="credit" name="credit" size ="30"
            maxlength="50" value="'.$row[3].'"></p>

            <br><p><input id="submit" type="submit" name="submit" value="Update"></p>
            <br><input type="hidden" name="id" value="'.$id.'"/>
            </a>

            </form>';
        }
        else
        {//if it didnt't run
            //message
            echo '<p class ="error">This page has been acessed in error<p>';
        }//end of it (result)
        mysqli_close($connect);//close the database connection_aborted
        ?>
    </body>
</html>