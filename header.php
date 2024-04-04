<html>
    <body>
       <?php
           //connect to server
           $connect = mysqli_connect("localhost","root","","university");

           if(!$connect)
           {
                die ('ERROR:' .mysqli_connect_error());
           }
           //echo 'successfull connect';
        ?>
    </body>
</html>