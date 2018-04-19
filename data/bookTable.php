<?php include("config.php"); ?>
<html>
    <head><title>Book Table</title></head>
    <body>
        <h1>Booking a table for <?php session_start(); echo $_SESSION['firstname']; ?></h1>
        <form method="POST" action="#">
            
            <input type="date" name="dateSelect" />
            <input type="submit" name="dateSubmit"/>  
        </form>
        
        <?php
            if(isset($_POST['dateSubmit'])){
                
                //if the submit button has been pressed, connect to the db
                //and search for all the available tables on that selected day
                $conn = mysqli_connect($host, $username, $password, $dbname);
                if (!$conn)
                {
                    die("connection failed: " . mysqli_connect_error());
                }
                
                  
                //selects all the bookings for the date chosen in the form
                $query= "SELECT * FROM booking WHERE bookingDate = '" . $_POST['dateSelect'] . "' ORDER BY tableID, bookingTime";
                $result = mysqli_query($conn, $query);
                //stop php while table headers outputted
                ?>
                
                <table border="1">
                    <tr><th></th><th>Times</th></tr>
                    <tr>
                        <th>table</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                    </tr>
                
                <?php //start php again to output the bookings available or not
                
                /*The next bulk of php is outputting the table showing which slots are booked and which are available.
                two while loops are needed, the outer one loops through the tables, the inner while loops through
                each of the times for the table. 
                Line 57 gets the first booking from result. Then while the loops are repeating they check if this booking
                is for the current timeslot and table being looked at. If so it puts an X in the td and carries out mysql_fetch_assoc
                again to get the next booking from the $result. This continues for each of the slots in the table. 
                */
                $numberOfTables = 5;//set to how many tables are in the resturantTable table in the db. Would be better to have this automated incase more tables are added
                $count = 1;//increases by one each time the loop repeats
                $row = mysqli_fetch_assoc($result);
                while($count <= $numberOfTables){
                    $time = 9;
                    echo "<tr>";
                    echo "<td>" . $count . "</td>";
                    while($time <= 16){//time begins at 9 and stops at 16. Would be better to get this from the db too.
                        if(($row['tableID'] == $count)&&(stripTime($row['bookingTime'])==$time)){
                            echo "<td style='background-color:lightCoral'>X</td>";
                            $row = mysqli_fetch_assoc($result);
                        }else{
                            echo "<td style='background-color:lightGreen'><a href='makeBooking.php?tableID=" . $count ."&time=" . $time . "&date=" . $_POST['dateSelect'] ."'>Book</a></td>";
                        }
                        
                        $time++;
                    }
                    echo "</tr>";
                    $count++;
                }//end while
                mysqli_close($conn);
                
        }//end if submit pressed
        
        //php function called stipTime, takes a time and leaves the first two digits. 
        //This function is called many times from line 63. 
        function stripTime($t){
            $temp = substr($t, 0, 2);
            return $temp;
        }
            ?>
            </table>
    </body>
</html>
