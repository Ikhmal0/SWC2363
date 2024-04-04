
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
        max-height:80px ; 
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
    <a href="staffList.php" >
    <button class="button block">Staff List</button>
</a>


<a href="studentList.php" >
    <button class="button block">Student List</button>
</a>

<a href="subjectList.php" >
    <button class="button block">subject List</button>
</a>
</nav>

</main>
</body>
</html>