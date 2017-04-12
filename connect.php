<?php
$host = "45.56.114.155";
$user = "db_user";
$password = "0Y8RusveQ5n1rGfwixtI";

$magic = mysqli_connect ( $host, $user, $password);
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
$database = mysqli_select_db($magic,"db");
?>