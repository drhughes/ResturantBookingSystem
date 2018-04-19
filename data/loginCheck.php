<?php 
  include("config.php");
         
  //gets the firstname from the input box on index.php - acting as a login page 
  $firstname = $_POST['firstnameInput'];
    
  //connects to database and checks that the connection is made and available to use
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn)
  {
    die("connection failed: " . mysqli_connect_error());
  }

  //query the database for the username typed in, checks if the user exists
  $sql= "SELECT * FROM customer WHERE firstname = '" . $firstname . "'";      
  $result = mysqli_query($conn, $sql);

  //if a result comes from the query, the user exists, creates a session 
  //variable (global to all pages) and redirects to the homepage
  if($row =mysqli_fetch_assoc($result)){
    session_start();
    $_SESSION["userID"] = $row['customerID'];
    $_SESSION["firstname"] = $firstname;
  ob_end_clean( );
    header("Location: homepage.php");
  }else{
    echo "You don't exist";
  }
  mysqli_close($conn);
 
 ?>