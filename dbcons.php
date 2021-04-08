<?php
	$hostname = "localhost";
	$username ="root";
	$password = "";
	$dbname ="room_booking";

	$conn = mysqli_connect($hostname,$username,$password,$dbname) ;
	
	if(!$conn){
		echo 'Connection Failed!!!';
	}

?>