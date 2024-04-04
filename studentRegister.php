<html>
<head>
<style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 50px solid #f1f1f1;}

            input[type=text], input[type=studentPassword], input[type=tel],select[id=courseCode] {
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

    //check for a studentID
    if (empty ($_POST ['studentID']))
    {
        $error [] = 'You forgot to the ID';
    }
    else
    {
        $id = mysqli_real_escape_string ($connect, trim ($_POST['studentID']));
    }

    //check for a studentPassword
    if (empty ($_POST ['studentPassword']))
    {
        $error [] = 'You forgot to the password';
    }
    else
    {
        $p = mysqli_real_escape_string ($connect, trim ($_POST['studentPassword']));
    }

    //check for a studentName
    if (empty ($_POST ['studentName']))
    {
        $error [] = 'You forgot to enter your name.';
    }
    else
    {
        $n = mysqli_real_escape_string ($connect, trim ($_POST ['studentName']));
    }

    //check for a studentIC
    if (empty ($_POST ['studentIC']))
    {
        $error [] = 'You forgot to enter your IC.';
    }
    else
    {
        $ic = mysqli_real_escape_string ($connect, trim ($_POST ['studentIC']));
    }

    //check for a courseCode
    if (empty ($_POST ['courseCode']))
    {
        $error [] = 'You forgot to enter your course code.';
    }
    else
    {
        $c = mysqli_real_escape_string ($connect, trim ($_POST ['courseCode']));
    }

    //check for a studentPhoneNo
    if (empty ($_POST ['studentPhoneNo']))
    {
        $error [] = 'You forgot to enter your phone number.';
    }
    else
    {
        $ph = mysqli_real_escape_string ($connect, trim ($_POST ['studentPhoneNo']));
    }

    //check for a studentEmail
    if (empty ($_POST ['studentEmail']))
    {
        $error [] = 'You forgot to enter your email.';
    }
    else
    {
        $e = mysqli_real_escape_string ($connect, trim ($_POST ['studentEmail']));
    }

    //check for a studentAddress
    if (empty ($_POST ['studentAddress']))
    {
        $error [] = 'You forgot to enter your address.';
    }
    else
    {
        $a = mysqli_real_escape_string ($connect, trim ($_POST ['studentAddress']));
    }

   //register the student in the database
    //make the query:
    $q = "INSERT INTO student (studentID, studentPassword, studentName, studentIC,
    courseCode, studentPhoneNo, studentEmail, studentAddress)
    VALUES ('$id', '$p', '$n', '$ic', '$c' ,'$ph', '$e', '$a')";
    $result = @mysqli_query ($connect, $q);//run the query
    if ($result)//if it run
    {
        //redirect the student to the homepage
        header("Location: studentLogin.php");

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
    

    <h2> Register student</h2>
    <!-- <h4> *required field </h4> -->
    
    <form action="studentRegister.php" method ="post">
        <div class="image">
            <img src="gambar/logoks.png" alt="logo" class="logo">
            <h2>KOLEJ SHAH ALAM</h2>
        </div>
        <div class="container">
            <label for="studentID">student ID:</label>
            <input type="text" id="studentID" name="studentID" size ="4" maxlength="6" 
            value="<?php if (isset($_POST['studentID'])) echo $_POST ['studentID'];?>">
        
            <lebal for="studentPassword">Password:</label>
            <input type="studentPassword" id="studentPassword" name="studentPassword" size="15" maxlength="60" 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
            uppercase and lowercase letter, and at least 8 or more characters" required
            value="<?php if (isset($_POST['studentPassword'])) echo $_POST ['studentPassword'];?>">
        
            <lebal for="studentName">student Name:</label>
            <input type="text" id="studentName" name="studentName" size="30" maxlength="50" required
            value="<?php if (isset($_POST['studentName'])) echo $_POST ['studentName'];?>">
        
            <lebal for="studentIC">Student IC:</label>
            <input type="tel" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}" id="studentIC" name="studentIC" 
            size="15" maxlength="20" required
            value="<?php if (isset($_POST['studentIC'])) echo $_POST ['studentIC'];?>">
        
            <label for="courseCode">Course Code:</label>
            <select id="courseCode" name="courseCode" required>
                <option value="">Select a courseCode</option>
                <option value="cc101" <?php if (isset($_POST['courseCode']) && $_POST['courseCode'] == 'math') echo 'selected';?>>cc101</option>
                 <option value="ct201" <?php if (isset($_POST['courseCode']) && $_POST['courseCode'] == 'science') echo 'selected';?>>ct201</option>
                <option value="be101" <?php if (isset($_POST['courseCode']) && $_POST['courseCode'] == 'english') echo 'selected';?>>be101</option>
            </select>
        
            <lebal for="studentPhoneNo">Phone No.:</label>
            <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="studentPhoneNo" name="studentPhoneNo" 
            size="15" maxlength="20" required
            value="<?php if (isset($_POST['studentPhoneNo'])) echo $_POST ['studentPhoneNo'];?>">
        
            <lebal for="studentEmail">Student Email:</label>
            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
            id="studentEmail" name="studentEmail" size="30" maxlength="50" required
            value="<?php if (isset($_POST['studentEmail'])) echo $_POST ['studentEmail'];?>">
        
            <lebal for="studentAddress">Student Address:</label>
            <input type="text" id="studentAddress" name="studentAddress" size="30" maxlength="50" required
            value="<?php if (isset($_POST['studentAddress'])) echo $_POST ['studentAddress'];?>">
        
            <button type="submit">Register</button>
            <button type="reset" style="background-color:white; color:black">Reset</button>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <a class="Cancel" href="studentLogin.php" style="background-color:red; color=#f1f1f1">Cancel</a>
        </div>
</form>
</body>
</html>