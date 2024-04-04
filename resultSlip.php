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

    main{
        width: 100%;
        float: none;
    }
    

    footer {
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
<main>
<div id="result" class="tabcontent">
 <h3>result</h3>
 <?php
 include 'header.php';

 $courseCode = 'result';

 $query = "SELECT * FROM student WHERE courseCode = '$courseCode'
 ORDER BY studentID";
 $result = mysqli_query($connect, $query);

 if (mysqli_num_rows($result) > 0) {
  {
 echo "<img align='center' src='jadual/"  . "' alt='' style='height: 350px;'>";
 }
 } else {
 echo "No result found.";
 }
 ?>
</main>
        
          
        <footer>
        <p>&copy; 2022 ITM University. All rights reserved.</p>
    </footer>
</body>
</html>