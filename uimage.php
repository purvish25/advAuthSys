<?php
session_start();
if(!isset($_SESSION["uid"])){
	header("Location: register.php");
	die();
}



?>
<!DOCTYPE HTML>
<html>
<head>
<title>Color</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Signer Register Form Responsive,Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<script type="text/javascript"  src="js/jquery.min.js"></script>
<link href="css/patternLock182b.css"  rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap-colorpalette.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
  <script type="text/javascript" src="js/bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/bootstrap-colorpalette.js" charset="utf-8"></script>
<!--Google Fonts-->
</head>
<body>
<!--sign up form start here-->
<div class="singup">
		<h3>Register</h3>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="col-md-12" style="background-color: white; padding:10%"> 
					<div class="form-group">
					<label for="email">Choose Image:</label>
					<input type="file" name="file" id="file" required="" accept="image/*">  
				</div>
					
				<button type="submit" name="submit" class="btn btn-default">Register</button>
				
			</div>
		</div>
	</form>

	<?php
if(isset($_POST["submit"])){
$uid=$_SESSION["uid"];
$date = date('Y-m-d H:i:s');
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 524288))
{
if ($_FILES["file"]["error"] > 0)
{
echo "<script type= 'text/javascript'>alert('Something went wrong with file.Please try again.');window.location = \"uimage.php\"</script>";
		exit();
}else {

if (file_exists("images/files/".$date."". $_FILES["file"]["name"]))
{
echo "<script type= 'text/javascript'>alert('That file name already exists.Please try again.');window.location = \"uimage.php\"</script>";
		exit();
}else
{
move_uploaded_file($_FILES["file"]["tmp_name"],"images/files/".$date."". $_FILES["file"]["name"]);
$fname=$date.$_FILES["file"]["name"]; 
$_SESSION["fname"]=$fname; ?>

<form action="uimagereg.php" method="post">
<!-- Enter your email: <input type="text" name="m2"> -->
<input type="image" alt=' Finding coordinates of an image' src="images/files/<?=$fname?>" name="foo" style="cursor:crosshair; max-width: 1000px; max-width: 600px;"/>
</form>

	
<?php }
}
}else
{
echo "<script type= 'text/javascript'>alert('That file is not valid.Please try again.');window.location = \"uimage.php\"</script>";
		exit();
}
}
	?>
</div>	

<!--sign up form end here-->
</body>
</html>