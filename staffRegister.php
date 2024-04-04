<html>
<head>
<style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 50px solid #f1f1f1;}

            input[type=text], input[type=staffPassword], input[type=tel] {
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

            .image {
                text-align: center;
                margin: 24px 0 12px 0;
            }

            img.logo {
                width: 10%;
                border-radius: 20%;
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

    <title>university Management System</title>

</head>
<body>
    <?php
    //call file to connect server university
    include ("header.php");
    ?>

    <?php
    //This query inserts a record in the university table
    //has form been submited?
    if ($_SERVER['REQUEST_METHOD']== 'POST')
    {
        $error = array ();//initialize an error array

    //check for a staffID
    if (empty ($_POST ['staffID']))
    {
        $error [] = 'You forgot to the ID';
    }
    else
    {
        $id = mysqli_real_escape_string ($connect, trim ($_POST['staffID']));
    }

    //check for a staffPassword
    if (empty ($_POST ['staffPassword']))
    {
        $error [] = 'You forgot to the password';
    }
    else
    {
        $p = mysqli_real_escape_string ($connect, trim ($_POST['staffPassword']));
    }

    //check for a staffName
    if (empty ($_POST ['staffName']))
    {
        $error [] = 'You forgot to enter your name.';
    }
    else
    {
        $n = mysqli_real_escape_string ($connect, trim ($_POST ['staffName']));
    }

    //check for a staffPhoneNo
    if (empty ($_POST ['staffPhoneNo']))
    {
        $error [] = 'You forgot to enter your phone number.';
    }
    else
    {
        $ph = mysqli_real_escape_string ($connect, trim ($_POST ['staffPhoneNo']));
    }

    //check for a staffEmail
    if (empty ($_POST ['staffEmail']))
    {
        $error [] = 'You forgot to enter your email.';
    }
    else
    {
        $e = mysqli_real_escape_string ($connect, trim ($_POST ['staffEmail']));
    }

    //check for a staffFaculty
    if (empty ($_POST ['staffFaculty']))
    {
        $error [] = 'You forgot to enter your email.';
    }
    else
    {
        $sf = mysqli_real_escape_string ($connect, trim ($_POST ['staffFaculty']));
    }

    //register the staff in the database
    //make the query:
    $q = "INSERT INTO staff (staffID, staffPassword, staffName, staffPhoneNo, staffEmail, staffFaculty)
    VALUES ('$id', '$p', '$n', '$ph', '$e', '$sf')";
    $result = @mysqli_query ($connect, $q);//run the query
    if ($result)//if it run
    {
        //redirect the user to the homepage
        header("Location: staffLogin.php");

        echo '<h1>thank you</h1>';
        exit();
    }
    else
    {//if it didn't run
        //message
        echo '<h1>System error<h1>';

        //debugging message
        echo '<p>' .mysqli_error($connect). '<br><br>Query: '.$q. '</p>';
    }//end of it (result)
    mysqli_close($connect); //close the database connection_aborted
    exit();
    } //end of the main submit conditional
    ?>
    

    <h2> Register Staff</h2>
    <!-- <h4> *required field </h4> -->
    
    <form action="staffRegister.php" method ="post">
        <div class="image">
            <img src="gambar/logoks.png" alt="logo" class="logo">
            <h2>KOLEJ SHAH ALAM</h2>
        </div>
        <div class="container">
            <label for="staffID">Staff ID:</label>
            <input type="text" id="staffID" name="staffID" size ="4" maxlength="6" 
            value="<?php if (isset($_POST['staffID'])) echo $_POST ['staffID'];?>">
        
            <lebal for="staffPassword">Password:</label>
            <input type="staffPassword" id="staffPassword" name="staffPassword" size="15" maxlength="60" 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
            uppercase and lowercase letter, and at least 8 or more characters" required
            value="<?php if (isset($_POST['staffPassword'])) echo $_POST ['staffPassword'];?>">
        
            <lebal for="staffName">Staff Name:</label>
            <input type="text" id="staffName" name="staffName" size="30" maxlength="50" required
            value="<?php if (isset($_POST['staffName'])) echo $_POST ['staffName'];?>">
        
            <lebal for="staffPhoneNo">Phone No.:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="staffPhoneNo" name="staffPhoneNo" 
            size="15" maxlength="20" required
            value="<?php if (isset($_POST['staffPhoneNo'])) echo $_POST ['staffPhoneNo'];?>">
        
            <lebal for="staffEmail">Staff Email:</label>
            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id="staffEmail" name="staffEmail" size="30" maxlength="50" required
            value="<?php if (isset($_POST['staffEmail'])) echo $_POST ['staffEmail'];?>">
        
            <label for="staffFaculty">Staff Faculty:</label>
            <input type="text" id="staffFaculty" name="staffFaculty" size ="4" maxlength="6" 
            value="<?php if (isset($_POST['staffFaculty'])) echo $_POST ['staffFaculty'];?>">
        
            <button type="submit">Register</button>
            <button type="reset" style="background-color:white; color:black">Clear All</button>

        </div>
        <div class="container" style="background-color:#f1f1f1">
            <a class="Cancel" href="adminLogin.php" style="background-color:red; color=#f1f1f1">Cancel</a>
        </div>
</form>
</body>
</html>