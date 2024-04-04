<html>
    <head>
        <title>eLeave Management System</title>
    </head>

<body>
    <?php
    //call file to connect server eleave
    include ("header.php");
    ?>

    <h2> Edit Admin Record</h2>

    <?php
    //look for a valid user id, either through GET or POST
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

        //look for a adminName
        if (empty ($_POST ['adminName']))
        {
            $error [] = 'You forgot to enter your name.';
        }
        else
        {
            $n = mysqli_real_escape_string ($connect, trim ($_POST ['adminName']));
        }

        //look for a adminPhoneNo
        if (empty ($_POST ['adminPhoneNo']))
        {
            $error [] = 'You forgot to enter your phone number.';
        }
        else
        {
            $ph = mysqli_real_escape_string ($connect, trim ($_POST ['adminPhoneNo']));
        }

        //look for a adminEmail
        if (empty ($_POST ['adminEmail']))
        {
            $error [] = 'You forgot to enter your email.';
        }
        else
        {
            $e = mysqli_real_escape_string ($connect, trim ($_POST ['adminEmail']));
        }

        //if no problem occured
        if (empty($error))
        {
            $q = "SELECT adminID FROM admin WHERE adminName= '$n' AND adminID != $id";

            $result = @mysqli_query ($connect, $q);//run the query

            if (mysqli_num_rows($result) == 0)
            {
                $q ="UPDATE admin SET adminName ='$n', adminPhoneNo ='$ph',
                adminEmail ='$e' WHERE adminID ='$id' LIMIT 1";

                $result = @mysqli_query ($connect, $q);//run the query

                if (mysqli_affected_rows($connect) == 1)
                {
                    echo '<script>alert ("The user has been edited");
                    window.location.href="adminList.php";</script>';
                }
                else
                {
                    echo '<p class ="error"> The user has not been edited due to the system error.
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

    $q = "SELECT adminName,adminPhoneNo, adminEmail
        FROM admin WHERE adminID = $id";

    $result = @mysqli_query ($connect, $q);//run the query

    if (mysqli_num_rows($result) ==1)
    {
        //get admin information
        $row =mysqli_fetch_array($result, MYSQLI_NUM);

        //create the form
        echo '<form action="adminUpdate.php" method ="post">
        <p><label class ="label" for="adminName">Admin Name*:</label>
        <input type="text" id="adminName" name="adminName" size ="30"
        maxlength="50" value="'.$row[0].'"></p>
        
        <p><br><label class ="label" for="adminPhoneNo">Phone No.*:</label>
        <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="adminPhoneNo"
        name="adminPhoneNo" size ="15" maxlength="20" value"'.$row[1].'"></p>
        
        <p><br><label class ="label" for="adminEmail">Admin Email*:</label>
        <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
        id="adminEmail" name="adminEmail" size="30" maxlength="50" required
        value="'.$row[2].'"></p>
        
        <br><p><input id="submit" type="submit" name="submit" value="Update"></p>
        <br><input type="hidden" name="id" value="'.$id.'"/>
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