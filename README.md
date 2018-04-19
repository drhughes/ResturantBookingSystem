This set of files is for a simplified booking system that should help you understand how to handle bookings with a MYSQL database and PHP. 
It allows customers to choose a date and see the available tables and times for a resturant. 

Note: it is incomplete and features are missing, it only focuses on booking! 

To get this up and running follow the steps below:

1. import the booking.sql file to mySQL, this will create the database, tables and put some dummy data into them
2. change the variable data in config.php so that it will connect to your mysql datbase, most likely in XAMPP
3. copy the data files into the webserver directory (htdocs folder for XAMPP) and run the index.php in a browser.
4. Try out the links, play with the options, and read the code and the comments. 

There are many additions that need to be made to this to make it fully functioning. 
There are no checks with the dates, for example I could book a table in the past. 
When displaying bookings I only need to see those that have not yet happened. etc.
