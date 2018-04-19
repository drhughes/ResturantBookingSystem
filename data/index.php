<?php 
include("config.php");
?>

<!-- This is the first page that appears. It is effectively a log in page. 
Try it out with the firstname David, Joe or Jane. These are the three users in the database that can book.
Login is not fully functional, this only captures a user so we can track who has booked a table -->
<html>
    <head>
        <title>Log-in page</title>
    </head>
    <body>
        <form method='POST' action='loginCheck.php'>
            Firstname:<input type="text" name="firstnameInput" />
            <input type="submit" value="submit" />
        </form>
    </body>
</html>