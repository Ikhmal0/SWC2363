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

    .billing-statement {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    .billing-statement h2 {
      font-size: 2.5em;
      margin-bottom: 20px;
    }

    .billing-statement table {
      border-collapse: collapse;
      width: 100%;
    }

    .billing-statement th,
    .billing-statement td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .billing-statement th {
      background-color: #f2f2f2;
    }

    .billing-statement .total {
      margin-top: 20px;
      font-weight: bold;
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
        <div class="billing-statement">
          <h2>Billing Statement</h2>
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2024-03-01</td>
                <td>Tuition Fee</td>
                <td>RM 200.00</td>
              </tr>
              <tr>
                <td>2024-03-05</td>
                <td>Textbook Purchase</td>
                <td>RM 150.00</td>
              </tr>
              <tr>
                <td>2024-03-10</td>
                <td>Lab Fee</td>
                <td>RM 50.00</td>
              </tr>
            </tbody>
          </table>
          <div class="total">
            <h3>Total:</h3>
            <p>RM 400.00</p>
          </div>
        </div>
          <script>
            // Example of how to update the balance
function updateBalance(newBalance) {
  const balanceElement = document.querySelector('.account-statement .balance p');
  balanceElement.textContent = `RM ${newBalance.toFixed(2)}`;
}

// Example of how to add a new row to the statement
function addStatementRow(date, description, amount) {
  const statementTableBody = document.querySelector('.account-statement .statement table tbody');
  const newRow = statementTableBody.insertRow();
  newRow.insertCell().textContent = date;
  newRow.insertCell().textContent = description;
  newRow.insertCell().textContent = amount;
}
          </script>
     <footer>
        <p>&copy; 2022 ITM University. All rights reserved.</p>
    </footer>
</body>
</html>