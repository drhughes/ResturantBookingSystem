<?php include("config.php"); ?>
<html>    
  <head></head>
    <body>
        
        <?php
          session_start();
          echo $_GET['tableID'] . "</br>";
          echo $_GET['time'] . "</br>";
          echo $_GET['date'] . "</br>";
          
          $conn = mysqli_connect($host, $username, $password, $dbname);
          if (!$conn)
          {
              die("connection failed: " . mysqli_connect_error());
          }
       
          //once the connection has been made and variables gethered using GET. The booking can be inserted to the booking table. 
          $query= "INSERT INTO booking (customerID, tableID, bookingTime, bookingDate) VALUES ('" . $_SESSION['userID'] . "', '". $_GET['tableID'] . "', '". $_GET['time'] . ":00:00', '". $_GET['date'] . "')";
          
          $result = mysqli_query($conn, $query);
          //outputs confirmation with a link back to the homepage
          echo "Booking made...<a href='homepage.php'>go back to home</a>";
          mysqli_close($conn);
        ?>
        
    </body>
</html>
<?php 

ob_end_flush( );
 ?>