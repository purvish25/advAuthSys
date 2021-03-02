<?php 
session_start();
if (!isset($_SESSION["tuser"])) {
    header("location: login.php"); 
    exit();
}
include("apisession.php");
if(isset($_SESSION["val_type"]) && $_SESSION["val_type"]!=4){
	unset($_SESSION["tuser_id"]);
	unset($_SESSION["tuser"]);
	unset($_SESSION["tuser_pass"]);
	unset($_SESSION["val_type"]);
	header("location: login.php");

}
?>
<?php
if(isset($_POST["submit"])){
if($_POST["ip1"]!='' or $_POST["ip2"]!='' or $_POST["ip3"]!='' or $_POST["ip4"]!='' or $_POST["ip5"]!='' or $_POST["ip6"]!='' or $_POST["ip7"]!='' or $_POST["ip8"]!='' or $_POST["ip9"]!=''){
		$uid=$_SESSION["tuser_id"];
		$user_name=$_SESSION["tuser"];
		$user_pass=$_SESSION["tuser_pass"];
		$val=$_SESSION["val_type"];

		include("connect.php");
		$cval="call blank_check('".$uid."','".$_POST['ip1']."','".$_POST['ip2']."','".$_POST['ip3']."','".$_POST['ip4']."','".$_POST['ip5']."','".$_POST['ip6']."','".$_POST['ip7']."','".$_POST['ip8']."','".$_POST['ip9']."')";
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
				echo "<script type= 'text/javascript'>alert('That is incorrect.Please try again');window.location = \"blanklogin.php\"</script>";
			}
		}else{
			// echo mysqli_error($conn);
			echo "<script type= 'text/javascript'>alert('Something went wrong.');window.location = \"blanklogin.php\"</script>";
		}
	
}else{
	echo "<script type= 'text/javascript'>alert('please enter atleast one value.');window.location = \"blanklogin.php\"</script>";
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--Google Fonts-->
</head>
<body>
<!--sign up form start here-->

<div class="singup">
		<h3>Login</h3>
	<div class="signup-main">
	  <form method="post" action="">
			<div>
					<div class="row">
						<div class="col-md-12 col-sm-12" style="padding-top: 20px;">	
							<input type="text" name="ip1" id="ip1" class="test" style="width: 16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip2" id="ip2" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip3" id="ip3" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12" style="padding-top: 20px;">	
							<input type="text" name="ip4" id="ip4" class="test" style="width: 16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip5" id="ip5" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip6" id="ip6" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12" style="padding-top: 20px;">	
							<input type="text" name="ip7" id="ip7" class="test" style="width: 16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip8" id="ip8" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
							<input type="text" name="ip9" id="ip9" class="test" style="width:16%;padding: 5%;margin-left: 5%;" autocomplete="off">
						</div>
					</div>
				</div>
	  <div class="send-button">
	    <input  type="submit" name="submit" value="Login" />
	  </div>
	      <p>Dont have an account?  <a href="register.php">Register</a></p>
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