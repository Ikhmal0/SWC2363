<html>
    <head>
    <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            form {border: 50px solid #f1f1f1;}

            input[type=text], input[type=password] {
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

        <title>University Management System</title>

    </head>
    <body>
        <?php
        //call file to connect server university
        include ("header.php");
        ?>

        <?php
        //This section processes submission from the login from
        //Check if the from has been submitted
        
        if ($_SERVER['REQUEST_METHOD']== 'POST')
        {

            //validate the staffID
            if (!empty($_POST['staffID']))
            {
                $id = mysqli_real_escape_string($connect, $_POST['staffID']);

            }
            else
            {
                $id = FALSE;
                echo '<p class = "error"> You forgot to enter your ID.</p>';
            }

            //validate the staffPassword
            if (!empty($_POST['staffPassword']))
            {
                $p = mysqli_real_escape_string($connect, $_POST['staffPassword']);
            }
            else
            {
                $p = FALSE;
                echo '<p class = "error"> You forgot to enter your password.</p>';
            }

            //if no problem
            if ($id && $p)
            {
                //Retrieve the staffID, staffPassword, staffName, staffPhoneNo, staffEmail
                $q = "SELECT staffID, staffPassword, staffName, staffPhoneNo, staffEmail, staffFaculty
                FROM staff WHERE (staffID ='$id' AND
                staffPassword ='$p')";

                //run the query and assign it to the variable $result
                $result = mysqli_query ($connect, $q);

                //count the number of roes that match the staffID/staffPassword combination
                //if one database row (record) matches the input:
                
                if (@mysqli_num_rows ($result) ==1)
                {
                    //start the session, fetch the record and insert the three values in an array
                    session_start();
                    $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    //redirect the user to the homepage
                    header("Location: staffPage.php");

                    echo'<p> Welcome to university System<p>';

                    //Cancle the rest of the script
                    exit();

                    mysqli_free_result ($result);
                    mysqli_close ($connect);
                    //no match was made
                }
                else
                {
                    echo '<p class ="error"> The staffID and staffPassword entered do not match our records
                    <br> perhaps you need to register, just click the Register button</p>';
                }
            
            //if there was a problem
            }
            else
            {
                echo '<p class ="error"> Please try again.</p>';
            }
            mysqli_close($connect);
        }//end of submit condittional
    

        ?>
    
        <h2 > STAFF LOGIN</h2>

        <form action="staffLogin.php" method="post">
        <div class="image">
            <img src="gambar/logoks.png" alt="logo" class="logo">
            <h2>KOLEJ SHAH ALAM</h2>
        </div>
        <div class="container">
            <label for="staffID">Staff ID:</label>
            <input type="text" id="staffID" name="staffID" size ="4" maxlength="6" 
            value="<?php if (isset($_POST['staffID'])) echo $_POST ['staffID'];?>">
        
            <lebal for="staffPassword">Password:</label>
            <input type="password" id="staffPassword" name="staffPassword" size="15" maxlength="60" 
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
            uppercase and lowercase letter, and at least 8 or more characters" required
            value="<?php if (isset($_POST['staffPassword'])) echo $_POST ['staffPassword'];?>">
    
        
            <button type="submit">Login</button>
            <button type="reset" style="background-color:white; color:black">Reset</button>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div>
            <label>Dont't have an account?
            <a href="staffRegister.php">Sign Up</a>
            </label>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <a class="Cancel" href="loginpage.html" style="background-color:red; color=#f1f1f1">Cancel</a>
        </div>
    </form>
    </body>
    </html>