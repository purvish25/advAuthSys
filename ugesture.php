<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("Location: register.php");
	die();
}
if(isset($_POST["submit"])){
$uid=$_SESSION["uid"];
if($_POST["temp"]!=''){
include("connect.php");
		$val="call insert_gesture('".$uid."','".$_POST['temp']."')";
		$result_val=mysqli_query($conn,$val);
		if($result_val){
			echo "<script type= 'text/javascript'>alert('You Are Registered Successfully.');window.location = \"index.php\"</script>";
		}else{
			echo mysqli_error($conn);
			//echo "<script type= 'text/javascript'>alert('Something went wrong.');window.location = \"register.php\"</script>";
		}

				}else{
	echo "<script type= 'text/javascript'>alert('please enter pattern.');window.location = \"ugesture.php\"</script>";
}
}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Blanks</title>
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
		<h3>Register</h3>
		<form action="" method="post">
			<div class="col-md-12" style="background-color: white; padding:10%"> 
					<div id="bodyContent">
       		 <div class="wrapper">
  
    <div id="sideContent">
      
        <div id="example">
          

            <div id="createPattern" class="pattern-holder">

            </div>
          <br>


            <br />
            <br />            
<input type="hidden" name="temp" id="temp" reuired>

        </div>
				<button type="submit" name="submit" class="btn btn-default">Next</button>
				
			</div>
		</div>
	</form>
</div>	

      


	


<script type="text/javascript"  src="js/jquery.min.js"></script>
 <script src="js/patternLockScript182b.js"></script>
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