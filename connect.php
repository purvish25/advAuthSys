<?php  

$db_host = "localhost"; 

$db_username = "id1041352_caliente_truss";  

$db_pass = "truss123#";  

$db_name = "id1041352_caliente"; 

$conn = new mysqli($db_host, $db_username, $db_pass, $db_name);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
              
?>