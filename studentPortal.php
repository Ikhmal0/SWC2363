<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .button {
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    
    }
    .button2 {
        background-color: #008CBA;
    } /* Blue */

    body {
        background-color:#E0FFFF;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    

    header {
        background-image: linear-gradient(to right, #f7f7f7,
        #08aeea);;
        display: flex;
        max-height:80px ; 
    }

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    background-color: #38444d;
    }

    li {
        float: left;
    }

    li a, .dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li.dropdown {
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {background-color: #f1f1f1;}

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .li-right
    {
        float: right;
    }
    
    .hero {
        background-color: #f4f4f4;
        padding: 20px;
        text-align: center;
    }

    .mySlides {
  display: none;
  margin-right: auto;
  right: 0;
}
   

    footer {
        
  bottom: auto;
  width: 100%;
  height: 50px;
        background-color: #333;
        padding: 20px;
        text-align: center;
        color: white;
    }
    </style>

   

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOLEJ SHAH ALAM</title>
    
</head>
<body>
    

    <header>
        
            <img src="gambar/logoks.png" 
            alt="logo" width="100" height="100">

            <h2>KOLEJ<br/>SHAH ALAM</h2>
       
        
    </header>

    

    <main>
         <ul>
         <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Academic</a>
                <div class="dropdown-content">
                    <a href="subjectR.php">Subject Registration</a>
                    <a href="subjectSlip.php">Subject Slip</a>
                    <a href="examSlip.php">Exam Slip</a>
                    <a href="resultSlip.php">Result Slip</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Student</a>
                <div class="dropdown-content">
                    <a href="studentPortal.php">Student Portal</a>
                    <a href="academicClender.html">Academic Clendar</a>
                    
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Time Table</a>
                <div class="dropdown-content">
                    <a href="timeTable.html">Time Table by Course</a>
                    <a href="stimeTable.php">Student Time Table</a>
                    
                </div>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Finance</a>
                <div class="dropdown-content">
                    <a href="account.php">Account Statement</a>
                    <a href="bill.php">Bill</a>
                    
                </div>
            </li>
            <li><a href="commuitypage.html">Community</a></li>
            <li><a href="https://www.ppas.gov.my/listings/perpustakaan-raja-tun-uda-shah-alam/">Library</a></li>
            <div class="li-right">
                <button type="button" class="button button2">
                    <a href="loginpage.html">Log out</a> 
                  </button>
            </div>
          </ul>
        

        <section class="hero">
            <h1>Welcome to KOLEJ SHAH ALAM</h1>
            <p>Your gateway to success</p>
        </section>

        
    <div style="width:500% hight: 100px;">
  <img align="right" class="mySlides" src="data:image/jpeg;base64,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" 
  style="width:100% hight: 25px;">
  <img align="right" class="mySlides" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRg6J6AsUJU01mzUP-ew1kb__B99z5ZrPnKLg&s" 
  style="width:100% hight: 50px;">
</div>
    
    <script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
        
    </main>



    <?php 
include ("header.php");

if (isset($_POST['studentID'])) {
    $in = $_POST['studentID'];
    $in = mysqli_real_escape_string($connect, $in);

    //make the query
    $q = "SELECT studentID, studentPassword, studentName, studentIC,
    courseCode, studentPhoneNo, studentEmail, studentAddress 
    FROM student WHERE studentID='$in' 
    ORDER BY studentID";

    //run the query and assign it to the variable $result
    $result = @mysqli_query ($connect, $q);

    if ($result) {
        // Fetch the first row from the result
        $row = mysqli_fetch_assoc($result);

        echo "STUDENT INFO <br><br>";

        //Display the student name
        echo "Name =".$row['studentName']."<br><br>";
        //Display the student IC
        echo "IC =".$row['studentIC']."<br><br>";
        //Display the course ID
        echo "Course =".$row['courseCode']."<br><br>";
        //Display the phone number
        echo "Phone number =".$row['studentPhoneNo']."<br><br>";
        //Display the email
        echo "Email =".$row['studentEmail']."<br><br>";
        //Display the address
        echo "Address =".$row['studentAddress']."<br><br>";
        //Display the date
        echo "Today is " . date("Y/m/d") . "<br>";
        //display the time
        echo "The time your login " . date("h:i:sa");

        //free up the resources
        mysqli_free_result ($result);

        //if failed to run
    } else {
        //error message
        echo '<p class ="error"> If no record is show, this
        is because you had an incorrect or missing entry in 
        search form.<br>Click the back button on the browser
        and try again.</p>';

        //debungging message
        echo '<p>'.mysqli_error ($connect).'<br><br/>Query:'.$q.'</p>';
    }//end of if ($result)

    //close the database connection
    mysqli_close($connect);
}
?>

        <div class="schedule">
          <h3>Class Schedules</h3>
          <ul style="background-color: white">
            <img src="gambar/jadualjpg.jpg" 
            alt="jadual cc101" style="width: 50%; display: block; margin-left: auto;margin-right: auto;">
          </ul>
        </div>
        


        
   
        
    
    <footer align="bottom">
        <p>&copy; 2022 ITM University. All rights reserved.</p>
    </footer>
</body>

</html>