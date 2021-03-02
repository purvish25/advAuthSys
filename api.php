<?php 
session_start();

if (isset($_SESSION["name"])) {
    header("location: login.php"); 
    exit();
}
?>
<?php

if(isset($_GET["app_name"]) && isset($_GET["app_key"]) && isset($_GET["app_token"])){
	$app_name=$_GET["app_name"];
	$app_key=$_GET["app_key"];
	$app_token=$_GET["app_token"];

}else{
	header("location: apierror.php"); 
    exit();
}


include("connect.php");
$api="call api_check('".$app_name."','".$app_key."','".$app_token."')";
$result_api=mysqli_query($conn,$api);
if(mysqli_num_rows($result_api)==1){
	while($details=mysqli_fetch_assoc($result_api)){
		$url=$details["redirect_url"];
	}

	$_SESSION["token"]=$app_token;
	$_SESSION["key"]=$app_key;
	$_SESSION["name"]=$app_name;
	$_SESSION["url"]=$url;
	header("location: login.php"); 
    exit();
}else{
	header("location: apierror.php"); 
    exit();
}


?>
