<?php include("config.php"); ?>
<html>
    
    <head>
        <title>User Bookings</title>
    </head>
    <body>
        <h1><?php session_start(); echo $_SESSION['firstname'] . "'s table bookings:"; ?></h1>
            
        <?php
            //this page allows a logged in user to view their bookings. 
            //connection to the database happens first
            $conn = mysqli_connect($host, $username, $password, $dbname);
            if (!$conn)
            {
                die("connection failed: " . mysqli_connect_error());
            }
            
            //this query uses an INNER JOIN. This is where we get data from more than one table. 
            // see the example here if you are unsure what this is: http://www.w3schools.com/sql/sql_join_inner.asp 
            //this one takes the bookings from the booking table as well as the table information for the tables that have been booked
            $query= "SELECT booking.tableID, booking.bookingTime, booking.bookingDate, resturantTable.seatsAtTable, resturantTable.tableLocation 
            FROM booking INNER JOIN resturantTable ON booking.tableID = resturantTable.tableID
            WHERE booking.customerID = '" . $_SESSION['userID'] . "' ORDER BY booking.bookingDate, booking.bookingTime";
              
            $result = mysqli_query($conn, $query);
            
            //we can then loop through each of the bookings and output them in a table
                echo "<table border='1'><tr><th>Date</th><th>Time</th><th>Location</th><th>Table ID</th><th>Seats</th></tr>";
                while($row = mysqli_fetch_assoc($result)){
                    echo "</tr>";
                     echo "<td>" . $row['bookingDate'] . "</td>";
                    echo "<td>" . $row['bookingTime'] . "</td>";
                    echo "<td>" . $row['tableLocation'] . "</td>";
                    echo "<td>" . $row['tableID'] . "</td>";
                    echo "<td>" . $row['seatsAtTable'] . "</td>";
                    echo "</tr>";
        
                }
            mysqli_close($conn);
        ?>
    </body>
</html>
<?php 

ob_end_flush( );
 ?>