<?php 
	include "connection.php";

	// $id = $_GET['id']; //it use when work with mysql
	$id = $_POST['id']; // use when work with Ajax

	$sql = "DELETE FROM registrations WHERE id = '$id'";

	if ($conn->query($sql) == TRUE) {
		echo 1;
	} else {
		echo 0;
	}
?>