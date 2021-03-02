<?php
require("apisession.php");
require("session.php");
$uname=$_SESSION["user"];
$uid=$_SESSION["user_id"];
session_destroy();
//header("Location: ../api1/success.php?user_name=$uname&uid=$uid");
echo '<script>window.location.href = "'.$_SESSION["url"].'/success.php?user_name='.$uname.'&uid='.$uid.'";</script>';
?>