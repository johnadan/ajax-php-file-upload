<?php

	$host = "localhost";
	$db_username = "root";  
	$db_password = "";
	$db_name = "sample";

	$conn = mysqli_connect($host, $db_username, $db_password, $db_name);

	if(!$conn){
		echo "Failed to connect to MYSQL:" . mysqli_connect_error();
	}

?>