<?php 
	include 'connection.php';
	$id = $_GET['id'];

	$name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $mobile_no = $_POST["number"];
    $image = $_POST["hidden"];//hidden input value old image

    $hobby = $_POST["hobby"];
    $hobby_chk="";  
    foreach($hobby as $chk1)  
    {  
      $hobby_chk.=$chk1." ";  
    } 

	// file upload variable
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "img/".$filename;

	// contain old image if file submit empty
    if (empty($filename)) {
    	$filename = $image;
    } else {
		// move the uploaded image into the folder:
	    if (move_uploaded_file($tempname,$folder)) {
	        echo "Image uploaded successfully";
	    } else{
	        echo "Failed to upload image";
	        exit();
	    }
    }

	$sql = "UPDATE registrations SET name = '$name', email = '$email', image = '$filename', gender = '$gender',hobby = '$hobby_chk', course = '$course', mobile_no = '$mobile_no' WHERE id = '$id'";


	if ($conn->query($sql) == TRUE) {
		$_SESSION['msg'] = "Record Updated Successfully";

        // redirect the index page
        header('Location: index.php');
	} else {
		echo "error: " . $conn->error;
	}
?>