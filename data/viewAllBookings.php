<?php include("config.php"); ?>
<html>
    <head><title>Book Table</title></head>
    <body>
        <h1>View All Bokings - Admin view</h1>
        <form method="POST" action="#">
            
            <input type="date" name="dateSelect" />
            <input type="submit" name="dateSubmit"/>  
        </form>
        
        <?php
            if(isset($_POST['dateSubmit'])){
                
                //if the submit button has been pressed, connect to the db
                //and search for all the available tables on that selected day
                echo $_POST['dateSelect'];
                
                $conn = mysqli_connect($host, $username, $password, $dbname);
                if (!$conn)
                {
                    die("connection failed: " . mysqli_connect_error());
                }
                  
                  $query= "SELECT * FROM booking INNER JOIN customer ON customer.customerID = booking.customerID WHERE bookingDate = '" . $_POST['dateSelect'] . "' ORDER BY tableID, bookingTime";
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
                    
                    /* see the comments on bookTable.php page to see an explantion. This code below is 
                    very similar to that but instead of outputting links to make a booking, this one outputs
                    the names of the person who made a booking. */
                    $numberOfTables = 5;
                    $count = 1;
                    $row = mysqli_fetch_assoc($result);
                    while($count <= $numberOfTables){
                       $time = 9;
                       echo "<tr>";
                       echo "<td>" . $count . "</td>";
                       while($time <= 16){
                           if(($row['tableID'] == $count)&&(stripTime($row['bookingTime'])==$time)){
                               echo "<td style='background-color:lightBlue'>" . $row['firstname'] . "</td>";
                               $row = mysqli_fetch_assoc($result);
                           }else{
                               echo "<td>Avail.</td>";
                           }
                          
                           $time++;
                       }
                        echo "</tr>";
                        $count++;
                    }//end while
                    
                    mysqli_close($conn);
            }//end if submit pressed
            function stripTime($t){
                $temp = substr($t, 0, 2);
                return $temp;
            }
                ?>
                </table>
    </body>
</html>
