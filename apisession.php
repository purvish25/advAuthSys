<?php 
session_start();
if (!isset($_SESSION["name"])) {
    header("location: api.php"); 
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
$name = mysqli_real_escape_string($conn, $_SESSION["name"]); // filter everything but numbers and letters
$key = mysqli_real_escape_string($conn, $_SESSION["key"]); // filter everything but numbers and letters
$token = mysqli_real_escape_string($conn, $_SESSION["token"]); // filter everything but numbers and letters


// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database
 

$user_count = "call api_check('".$name."','".$key."','".$token."')";
$result_count = mysqli_query($conn,$user_count); // query the person

// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($result_count); // count the row nums
if ($existCount == 0) { // evaluate the count
	 
	 echo "<script type= 'text/javascript'>alert('login data not on record.');window.location = \"apierror.php\"</script>";
}
?>
