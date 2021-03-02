<?php 
session_start();
if (!isset($_SESSION["tuser"])) {
    header("location: login.php"); 
    exit();
}
include("apisession.php");
if(isset($_SESSION["val_type"]) && $_SESSION["val_type"]!=1){
	unset($_SESSION["tuser_id"]);
	unset($_SESSION["tuser"]);
	unset($_SESSION["tuser_pass"]);
	unset($_SESSION["val_type"]);
	header("location: login.php");

}
?>
<?php
include("connect.php");
$gimg="call get_image('".$_SESSION['tuser_id']."')";
$result_gimg=mysqli_query($conn,$gimg);
while($ig=mysqli_fetch_assoc($result_gimg)){
	$img_src=$ig["pic_url"];
	$x=$ig["x"];
	$y=$ig["y"];
}
if(isset($_POST["foo_x"])){
	
		$uid=$_SESSION["tuser_id"];
		$user_name=$_SESSION["tuser"];
		$user_pass=$_SESSION["tuser_pass"];
		$val=$_SESSION["val_type"];
			$a=$x-4;
			$b=$x+4;
			$c=$y-4;
			$d=$y+4;
			$x1=$_POST["foo_x"];
			$y1=$_POST["foo_y"];

			if($x1 >= $a && $x1 <= $b){
				if($y1 >= $c && $y1 <= $d){
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
					echo "<script type= 'text/javascript'>alert('That is incorrect.Please try again');window.location = \"imagelogin.php\"</script>";
				}
			}else{
				echo "<script type= 'text/javascript'>alert('That is incorrect.Please try again');window.location = \"imagelogin.php\"</script>";
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
	 <form action="" method="post">
	 <div style="overflow: auto;">
<!-- Enter your email: <input type="text" name="m2"> -->
<input type="image" alt=' Finding coordinates of an image' src="images/files/<?=$img_src?>" name="foo" style="cursor:crosshair; max-width: 1000px; max-width: 600px;"/>
</div>
</form>
	</div>
</div>	

<script type="text/javascript"  src="js/jquery.min.js"></script>
	
   
  
        <script src="js/patternLockScript182b.js"></script>

<!--sign up form end here-->
</body>
</html>