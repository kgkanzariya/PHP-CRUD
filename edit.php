<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Form</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style type="text/css">
        .error {
            color: red;
        }
        #spnError {
            display: none;
        }
    </style>
</head>
<body style="background-color: #08575B;" class="text-white">
	<?php 
		include 'connection.php';
		$id = $_GET['id'];

		$sql = "SELECT *FROM registrations WHERE id = $id";
		$results = $conn->query($sql);
		if ($results == TRUE) {
		    $row = $results->fetch_assoc();

		    $name = $row["name"]; 
		    $email = $row["email"]; 
		    $image = $row["image"]; 
		    $gender = $row["gender"]; 
            $hobby = $row["hobby"]; 
		    $course = $row["course"]; 
		    $mobile_no = $row["mobile_no"]; 
		}
	?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 my-4 text-center">
				<h2 class="display-5 fw-bold">Edit Form</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-12">
				<form action='update.php?id=<?php echo $row['id']; ?>' method="POST" enctype="multipart/form-data" class="shadow-lg border border-2 py-4 px-5" style="background-color: #419397;"> 
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="name" class="ms-2 my-2">Enter Name: <span class="text-danger">*</span></label>
							<input type="name" name="name" id="name" placeholder="Full name" class="form-control rounded ps-4" value="<?php echo $name; ?>">
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="email" class="ms-2 my-2">Enter Email: <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" placeholder="Enter your email" class="form-control rounded ps-4" value="<?php echo $email; ?>">
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="file" class="ms-2 my-2">Enter Image: <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="file" class="form-control rounded">
                            <input type="hidden" name="hidden" id="file" class="form-control rounded" value="<?php echo $image ?>">
                            <div class="row justify-content-end">
                                <div class="col-lg-2 col-md-4 col-12">
                                    <img class="w-100" src="img/<?php echo $image; ?>">
                                </div>
                            </div>
						</div>
						<div class="col-lg-2 col-md-2 col-12 my-2">
							<p class="ms-2 my-2">Select Gender: <span class="text-danger">*</span></p>
							<div class="row ps-3 pt-1">
								<div class="col-lg-12 col-md-12 col-12 ps-0">
                                    <?php 
                                        $male = "";
                                        $female = "";
                                        if ($gender == 0) {
                                            $male = "checked";
                                        }
                                        else {
                                            $female = "checked";
                                        }
                                    ?>
									<input class="form-check-input" type="radio" name="gender"  id="male" value="0"<?php echo $male; ?>>
									<label class="form-check-label" for="male">Male</label>
									<input class="form-check-input ms-2" type="radio" name="gender" id="female" value="1"<?php echo $female; ?>>
									<label class="form-check-label" for="female">Female</label>
								</div>	
                                <span class="gender_err p-0"></span>	
							</div>
						</div>
                        <div class="col-lg-4 col-md-4 col-12 my-2 ps-5">
                            <p class="ms-2 my-2">Hobbies: <span class="text-danger">*</span></p>
                            <?php 
                                $hobby_arr = explode(" ", $hobby);
                            ?>
                            <div class="row ps-3 pt-1">
                                <div class="col-lg-4 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]"  id="reading" value="1"<?php if(in_array("1",$hobby_arr)) { ?> checked="checked" <?php } ?>>
                                        <label class="form-check-label" for="reading">Reading</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="writing" value="2"<?php if(in_array("2",$hobby_arr)) { ?> checked="checked" <?php } ?>>
                                        <label class="form-check-label" for="writing">Writing</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="playing" value="3"<?php if(in_array("3",$hobby_arr)) { ?> checked="checked" <?php } ?>>
                                        <label class="form-check-label" for="playing">Playing</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="photography" value="4"<?php if(in_array("4",$hobby_arr)) { ?> checked="checked" <?php } ?>>
                                        <label class="form-check-label" for="photography">Photography</label>
                                    </div>
                                </div>
                            </div>
                            <span class="hobby_err p-0"></span>
                        </div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="course" class="ms-2 my-2">Select Course: <span class="text-danger">*</span></label>
							<?php 
                                $bca = "";
                                $bsc = "";
                                $pgdca = "";
                                    if ($course == 1) {
                                        $bca = "selected";
                                    } else if ($course == 2) {
                                        $bsc = "selected";
                                    }else {
                                        $pgdca = "selected";
                                    } 
                            ?>
							<select class="form-select" name="course" aria-label="Default select example" id="course" value="<?php echo $course; ?>">
                                <option value="">--select course--</option>
                                <option value="1"<?php echo $bca; ?>>BCA</option>
                                <option value="2"<?php echo $bsc; ?>>BSC/IT</option>
                                <option value="3"<?php echo $pgdca; ?>>PGDCA</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="number" class="ms-2 my-2">Enter number: <span class="text-danger">*</span></label>
							<input type="number" name="number" id="number" placeholder="Enter your Mo.number" class="form-control rounded" value="<?php echo $mobile_no;?>">
						</div>
						<div class="col-lg-12 col-md-12 col-12 mt-5 mb1 text-center">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- bootstrap cdn -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("form").validate({
                errorPlacement: function(error, element) {
                    //change error text position
                    if (element.attr("name") == "gender"){
                        $(".gender_err").append(error);
                    } else if (element.attr("name") == "hobby[]") {
                         $(".hobby_err").append(error);
                    } else {   
                        error.insertAfter(element);
                    }
                },
                rules: {
                    "hobby[]": {
                        required: true
                    },
                    name : {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    gender : {
                        required: true
                    },
                    course : {
                        required: true
                    },
                    number : {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages : {
                    name: {
                        required : "Name is required"   
                    },
                    email: {
                        required : "Email is required",
                        email: "The email should be in the format: abc@gmail.com"
                    },
                    gender: {
                        required : "Gender is required"
                    },

                    "hobby[]": "You must check at least 1 box",

                    course: {
                        required: "Course is required"
                    },
                    number: {
                        required : "Mobile number is required",
                        minlength: "Only 10 digits are required",
                        maxlength: "Only 10 digits are required"
                    },
                }
            });
        });
    </script>

</body>
</html>