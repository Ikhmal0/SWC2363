
<html>
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
  margin: 50px; //distance between button
  cursor: pointer;
    }
  .block {
  display: center;
  width: 50%;
  border: none;
  background-color: #008CBA;
  color: white;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    

    header {
        background-image: linear-gradient(to right, #f7f7f7,
        #08aeea);;
        display: flex;
        max-height:50px ; 
    }

    .center {
  display: block;
  justify-content: center;
  align-items: center;
  height: 500px;
  background-image: linear-gradient(to right,#08aeea, #f7f7f7,
        #08aeea);
    }
        </style>

    </head>

<body>
    <main>

<nav class="center" align="center">


<a href="studentList.php" >
    <button class="button block">Student List</button>
</a>

<a href="subjectList.php" >
    <button class="button block">subject List</button>
</a>

<button type="button" class="button block" style="backgroud-color:white;">
                    <a href="loginpage.html">Log out</a> 
                  </button>
</nav>

<button type="button" class="button button2">
                    <a href="loginpage.html">Log out</a> 
                  </button>

</main>
<form action="staffpage.php" method="POST">

            
                <h1>Send To Student</h1>
            
                <h2>1. Send Reminder Emails</h2>
                <button onclick="sendReminderEmails()">Send Reminder Emails</button>
            
                <h2>2. Retrieve Data for Report</h2>
                <button onclick="getDataAndGenerateReport()">Generate Report</button>
            
                <h2>3. Messaging System</h2>
                <label for="studentId">Student ID:</label>
                <input type="text" id="studentId" name="studentId" placeholder="Enter student ID"><br><br>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" cols="50" placeholder="Enter message"></textarea><br><br>
                
                <button onclick="sendMessage()">Send Message</button>
                <button onclick="getAndDisplayMessages()">Get Messages</button>
                <ul id="messages"></ul>
            
                <script>
                    // Function to send reminder emails to students
                    function sendReminderEmails() {
                        // Simulate sending reminder emails
                        alert("Reminder emails sent successfully!");
                    }
            
                    // Function to retrieve data from the database and generate a report
                    function getDataAndGenerateReport() {
                        // Simulate retrieving data and generating a report
                        alert("Data retrieved for report!");
                    }
            
                    // Function to send a message to a student
                    function sendMessage() {
                        var studentId = document.getElementById("studentId").value;
                        var message = document.getElementById("message").value;
            
                        // Send a POST request to a PHP script with student ID and message
                        fetch('send_message.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ studentId: studentId, message: message }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            alert(data.message);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
            
                    // Function to retrieve messages for a user and display them
                    function getAndDisplayMessages() {
                        var studentId = document.getElementById("studentId").value;
            
                        // Send a POST request to a PHP script with student ID
                        fetch('get_messages.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({ studentId: studentId }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            displayMessages(data.messages);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
            
                    // Function to display messages in a list
                    function displayMessages(messages) {
                        var list = document.getElementById("messages");
                        list.innerHTML = ""; // Clear the list
            
                        messages.forEach(function(message) {
                            var item = document.createElement("li");
                            item.innerText = message.text;
                            list.appendChild(item);
                        });
                    }
                </script>
            
</body>
</html>