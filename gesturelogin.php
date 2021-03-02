<?php 
session_start();
if (!isset($_SESSION["tuser"])) {
    header("location: login.php"); 
    exit();
}
include("apisession.php");

if(isset($_SESSION["val_type"]) && $_SESSION["val_type"]!=3){
	unset($_SESSION["tuser_id"]);
	unset($_SESSION["tuser"]);
	unset($_SESSION["tuser_pass"]);
	unset($_SESSION["val_type"]);
	header("location: login.php");

}
?>
<?php
if(isset($_POST["submit"])){
if($_POST["temp"]!=''){
		$uid=$_SESSION["tuser_id"];
		$user_name=$_SESSION["tuser"];
		$user_pass=$_SESSION["tuser_pass"];
		$val=$_SESSION["val_type"];

		include("connect.php");
		$cval="call gesture_check('".$uid."','".$_POST['temp']."')";
		$result_val=mysqli_query($conn,$cval);
		if($result_val){
			if(mysqli_num_rows($result_val)==1){
				unset($_SESSION["tuser_id"]);
				unset($_SESSION["tuser"]);
				unset($_SESSION["tuser_pass"]);
				unset($_SESSION["val_type"]);
				$_SESSION["user_id"] = $uid;
			  	$_SESSION["user"] = $user_name;
    			$_SESSION["user_pass"]=$user_pass;
    			$_SESSION["val_type"]=$val;
     			header("Location: logged.php");
			}else{
				echo "<script type= 'text/javascript'>alert('That is incorrect.Please try again');window.location = \"gesturelogin.php\"</script>";
			}
		}else{
			// echo mysqli_error($conn);
			echo "<script type= 'text/javascript'>alert('Something went wrong.');window.location = \"gesturelogin.php\"</script>";
		}
	
}else{
	echo "<script type= 'text/javascript'>alert('please enter pattern.');window.location = \"gesturelogin.php\"</script>";
}
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Signer Register Form Responsive,Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/patternLock182b.css"  rel="stylesheet" type="text/css" />
<!--Google Fonts-->
</head>
<body>
<!--sign up form start here-->

<div class="singup">
		<h3>Login</h3>
	<div class="signup-main">
	  <form method="post" action="">
			<div id="bodyContent">
       		 <div class="wrapper">
  
    <div id="sideContent">
      
        <div id="example" style="padding: 15%">
          

            <div id="createPattern" class="pattern-holder">

            </div>
          <br>


            <br />
            <br />            
<input type="hidden" name="temp" id="temp" reuired>

        </div>

	  <div class="send-button">
	    <input  type="submit" name="submit" value="Login" />
	  </div>
	      <p>Dont have an account?  <a href="register.php">Register</a></p>
	  </form>
	</div>
</div>	

<script type="text/javascript"  src="js/jquery.min.js"></script>
	
   
  
        <script src="js/patternLockScript182b.js"></script>
<script>

$( "#temp" ).change(function() {
  alert( "Handler for .change() called." );
});
</script>
<!--sign up form end here-->
</body>
</html>