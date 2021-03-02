<?php

session_start();
$foo_x=$_POST['foo_x'];
$foo_y=$_POST['foo_y'];
$uid=$_SESSION["uid"];
$fname=$_SESSION["fname"];

include("connect.php");

$image="call insert_image('".$uid."','".$fname."','".$foo_x."','".$foo_y."')";
$insert_image=mysqli_query($conn,$image);
if($insert_image){
	echo "<script type= 'text/javascript'>alert('You Are Registered Successfully.');window.location = \"index.php\"</script>";
		unset($_SESSION["uid"]);
		unset($_SESSION["fname"]);
		exit();
}else{
	echo "<script type= 'text/javascript'>alert('Something went wrong with file.Please try again.');window.location = \"image.php\"</script>";
		exit();
}

?>