<?php 
session_start();

if (isset($_SESSION["user"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php
if(isset($_POST["submit"])){
include("connect.php");
		$check="call user_check('".$_POST['user_name']."')";
		$result_check=mysqli_query($conn,$check);
		if(mysqli_num_rows($result_check)!=0){
	include("connect.php");
	$user="call forgot_check('".$_POST['user_name']."','".$_POST['que']."','".$_POST['ans']."')";
	$result_user=mysqli_query($conn,$user);
	if(mysqli_num_rows($result_user)>0){
		while($id=mysqli_fetch_assoc($result_user)){
			$uid=$id["user_id"];
			$mail=$id["user_mail"];
			$val=$id["val_type"];
		}
		include("ver_mail.php");
		$mail_send=send_ver_mail($mail,$_POST["user_name"],$uid);
		if($mail_send==1){
		$_SESSION["forgot"]=1;
		$_SESSION["uid"]=$uid;


		header("location: rst.php"); 
    	exit();
		}
		}else{
			// echo mysqli_error($conn);
			 echo "<script type= 'text/javascript'>alert('Credentials are wrong.');window.location = \"login.php\"</script>";
		}

		}else{
			echo "<script type= 'text/javascript'>alert('User is not on the record.');window.location = \"register.php\"</script>";
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
		<h3>Login</h3>
	<div class="signup-main">
	  <form method="post" action="">
		
		<div class="form-group">
					<label for="usr">User Name:</label>
					<input type="text" class="form-control" id="user_name" name="user_name" required="" autocomplete="off" style="width: 100%">
		</div>

			<div class="form-group">
				<?php include("connect.php");
						$ques="call select_ques()";
						$result_ques=mysqli_query($conn,$ques); ?>
					<label for="sel1">Validation Type:</label>
					<select class="form-control" id="que" name="que" required="" autocomplete="off">
						<option>Security Question</option>
						<?php if(mysqli_num_rows($result_ques)>0){ 
							while($que=mysqli_fetch_assoc($result_ques)){ ?>
							<option value="<?=$que['id']?>"><?=$que['question']?></option>
						<?php } } ?>
					</select>

				</div>

				<div class="form-group">
					<label for="usr">Answer:</label>
					<input type="text" class="form-control" id="ans" name="ans" required="" autocomplete="off" style="width: 100%">
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