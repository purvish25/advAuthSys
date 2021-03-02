<?php 
session_start();

if (isset($_SESSION["auser"])) {
    header("location: apireg.php"); 
    exit();
}
?>
<?php
if(isset($_POST["submit"])){

	include("connect.php");
	$user="call login_check('".$_POST['user_name']."','".$_POST['user_pass']."')";
	$result_user=mysqli_query($conn,$user);
	if(mysqli_num_rows($result_user)>0){
		while($id=mysqli_fetch_assoc($result_user)){
			$uid=$id["user_id"];
			$mail=$id["user_mail"];
			$val=$id["val_type"];
		}
		$_SESSION["auser_id"]=$uid;
		$_SESSION["auser"]=$_POST["user_name"];
		$_SESSION["mail"]=$mail;
		
			
		}else{
			// echo mysqli_error($conn);
			 echo "<script type= 'text/javascript'>alert('Credentials are wrong.');window.location = \"login.php\"</script>";
		}
	}




?>
<!DOCTYPE HTML>
<html>
<head>
<title>API</title>
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
		
		<div class="form-group">
					<label for="usr">User Name:</label>
					<input type="text" class="form-control" id="user_name" name="user_name" required="" autocomplete="off">
		</div>

		<div class="form-group">
					<label for="usr">Password:</label>
					<input type="password" class="form-control" id="user_pass" name="user_pass" required="" autocomplete="off">
		</div>


	  <div class="send-button">
	    <input  type="submit" name="submit" value="Login" />
	  </div>
	   
	  </form>
	
	  
	</div>
</div>	

<script type="text/javascript"  src="js/jquery.min.js"></script>
<script>
		   $('.test').keypress(function(event){
            console.log(event.which);
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }});
	</script>

<!--sign up form end here-->
</body>
</html>