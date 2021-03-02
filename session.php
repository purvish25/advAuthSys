<?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("location: login.php"); 
    exit();
}
?>
<?php
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
 //   last request was more than 30 minutes ago
   	session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();
    header("location: login.php");   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time();

include "connect.php";
// Be sure to check that this manager SESSION value is in fact in the database
$userID = mysqli_real_escape_string($conn, $_SESSION["user_id"]); // filter everything but numbers and letters
$user = mysqli_real_escape_string($conn, $_SESSION["user"]); // filter everything but numbers and letters
$pass = mysqli_real_escape_string($conn, $_SESSION["user_pass"]); // filter everything but numbers and letters
$val = mysqli_real_escape_string($conn, $_SESSION["val_type"]); // filter everything but numbers and letters


// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database
 

$user_count = "call session_check('".$userID."','".$user."','".$pass."','".$val."')";
$result_count = mysqli_query($conn,$user_count); // query the person

// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($result_count); // count the row nums
if ($existCount == 0) { // evaluate the count
	 
	 echo "<script type= 'text/javascript'>alert('login data not on record.');window.location = \"login.php\"</script>";
}
?>
