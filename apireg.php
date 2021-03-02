<?php 
session_start();

if (!isset($_SESSION["auser"])) {
    header("location: capi.php"); 
    exit();
}
include("connect.php");
		$us="call user_check('".$_SESSION["auser"]."')";
		$result_us=mysqli_query($conn,$us);
		if(mysqli_num_rows($result_us)==0){
				unset($_SESSION["auser"]);
				unset($_SESSION["auser_id"]);
				header("location: capi.php"); 
    			exit();
		}
?>
<?php
if(isset($_POST["submit"])){
		
		include("connect.php");
		$check="call app_check('".$_POST['app_name']."')";
		$result_check=mysqli_query($conn,$check);
		if(mysqli_num_rows($result_check)==0){
			
			$tokencharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  		 	$token = '';
 			$max = strlen($tokencharacters) - 1;
 			for ($i = 0; $i < 20; $i++) {
      		$token .= $tokencharacters[mt_rand(0, $max)];
 			}

 			$characters = '0123456789';
  		 	$key = '';
 			$max1 = strlen($characters) - 1;
 			for ($i = 0; $i < 6; $i++) {
      		$key .= $characters[mt_rand(0, $max1)];
 			}

			include("connect.php");
			$api="call insert_api('".$_POST['app_name']."','".$key."','".$token."','".$_POST['url']."','".$_SESSION['auser_id']."')";
			$result_api=mysqli_query($conn,$api);
			include("api_mail.php");
			$mail_send=send_ver_mail($_SESSION["mail"],$_SESSION["auser"],$_SESSION["auser_id"],$_POST["app_name"],$key,$token);		
			if($result_api){
				unset($_SESSION["mail"]);
				unset($_SESSION["auser"]);
				unset($_SESSION["auser_id"]);
				if($mail_send==1){
						echo "<script type= 'text/javascript'>alert('App Created Successfully.Please check your mail for details.');window.location = \"capi.php\"</script>";
				}else{
					echo "<script type= 'text/javascript'>alert('Mail not sent.Please contact admin for details');window.location = \"capi.php\"</script>";
				}
				
			}
		}else{
			echo "<script type= 'text/javascript'>alert('App already exists.');window.location = \"apireg.php\"</script>";
		}
	
}


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Register</title>
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!-- Custom Theme files -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="keywords" content="Signer Register Form Responsive,Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href="css/patternLock182b.css"  rel="stylesheet" type="text/css" />
	<!--Google Fonts-->
</head>
<body>
	<!--sign up form start here-->
	
	<div class="singup">
		<h3>Register</h3>
		<form action="" method="post">
			<div class="col-md-12" style="background-color: white; padding:10%"> 
				<div class="form-group">
					<label for="usr">App Name:</label>
					<input type="text" class="form-control" id="app_name" name="app_name" required="" autocomplete="off">
				</div>
				
				<div class="form-group">
					<label for="email">Redirect URL:</label>
					<input type="url" class="form-control" id="url" name="url" required="" autocomplete="off">
				</div>
				
				<button type="submit" name="submit" class="btn btn-default">Create</button>
				
			</div>
		</div>
	</form>
</div>	


<script type="text/javascript"  src="js/jquery.min.js"></script>
<script>
		   $('#user_phone').keypress(function(event){
          
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault();
        }});
	</script>
	<!--sign up form end here-->
</body>
</html>