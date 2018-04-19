<?php ob_start( ); ?>
<html>

    <head><title>Homepage</title></head>
    
    <body>
        <h1>Halesowen College Resturant</h1>
        <?php
            session_start();
            if(!isset($_SESSION['userID'])){
                echo "You have not logged in";
            }else{ 
                echo "Welcome " . $_SESSION['firstname'] . ", what would you like to do?";
                ?>
                <ul>
                    <li><a href="viewUserBooking.php">View my bookings</a></li>
                    <li><a href="bookTable.php">Book a table</a><br></li>
                    <li><a href="viewAllBookings.php">View all bookings (admin example)</a><br></li>
                </ul>
                <?php
            }
        ?>
    </body>
</html>
<?php 

ob_end_flush( );
 ?>