<?php
    error_reporting(0);
?>
<?php 
	include 'connection.php';

    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $mobile_no = $_POST["number"];

    $hobby = $_POST["hobby"];
    // insert checkbox value in database
    $hobby_chk="";  
    foreach($hobby as $chk1)  
    {  
      $hobby_chk.=$chk1." ";  
    } 

    // file upload variable
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "img/".$filename; 
    
    $sql = "INSERT INTO registrations(name,email,image,gender,hobby,course,mobile_no) VALUES ('$name','$email','$filename','$gender','$hobby_chk','$course','$mobile_no') ";

    // move the uploaded image into the folder:
    if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully";
    } else{
        echo "Failed to upload image";
        exit();
    }  

    if ($conn->query($sql) == TRUE) {
        session_start();
        $_SESSION['msg'] = "Record Inserted Successfully";

        // redirect the index page
        header('Location: index.php');
    } else {
        echo "error: " . $conn->error;
    }

    $conn->close();
?>