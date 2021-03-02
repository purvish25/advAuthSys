<?php
session_start();
if (!isset($_SESSION["forgot"])) {
    header("location: index.php"); 
    exit();
}

if(isset($_GET["id"])){
	$uid=$_GET["id"];
	if($uid!=$_SESSION["uid"]){
		session_destroy();
		header("location: index.php"); 
    exit();
	}
}else{
	 header("location: index.php"); 
    exit();
}
if(isset($_POST["submit"])){
			
			include("connect.php");
			$user="call update_pass('".$uid."','".$_POST['val_type']."','".$_POST['user_pass']."')";
			$result_user=mysqli_query($conn,$user);
			if($result_user){
				session_destroy();
				session_start();
				$_SESSION["uid"]=$uid;
				if($_POST["val_type"]==1){
					header("Location: uimage.php");
					die();
				}else if($_POST["val_type"]==2){
					header("Location: ucolor.php");
					die();
				}else if($_POST["val_type"]==3){
					header("Location: ugesture.php");
					die();
				}else if($_POST["val_type"]==4){
					header("Location: ublank.php");
					die();
				}
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
				<?php include("connect.php");
						$types="call select_types()";
						$result_types=mysqli_query($conn,$types); ?>
					<label for="sel1">Validation Type:</label>
					<select class="form-control" id="val_type" name="val_type" required="" autocomplete="off">
						<option>Select Validation type</option>
						<?php if(mysqli_num_rows($result_types)>0){ 
							while($type=mysqli_fetch_assoc($result_types)){ ?>
							<option value="<?=$type['id']?>"><?=$type['type']?></option>
						<?php } } ?>
					</select>

				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="user_pass" name="user_pass" required="" autocomplete="off">
				</div>

				
				<button type="submit" name="submit" class="btn btn-default">Next</button>
				
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