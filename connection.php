<?php 
	$servername = "localhost";
	$username = "root";
	$psword = "";
	$dbname = "php_training";

	$conn = new mysqli($servername,$username,$psword,$dbname);

	if ($conn->connect_error) {
		die("connection failed: " . $conn->connect_error);
	}
?>