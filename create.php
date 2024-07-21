<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
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
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 my-4 text-center">
				<h2 class="display-5 fw-bold" style="">Registration Form</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-12">
				<form action="store.php" method="POST" class="shadow-lg border border-2 py-4 px-5" enctype="multipart/form-data" style="background-color: #419397;"> 
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="name" class="ms-2 my-2">Enter Name: <span class="text-danger">*</span></label>
							<input type="name" name="name" id="name" placeholder="Full name" autocomplete="on" class="form-control rounded ps-4">
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="email" class="ms-2 my-2">Enter Email: <span class="text-danger">*</span></label>
							<input type="email" name="email" id="email" placeholder="Enter your email" autocomplete="on" class="form-control rounded ps-4">
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="file" class="ms-2 my-2">Enter Image: <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="file" class="form-control rounded">
						</div>
						<div class="col-lg-2 col-md-6 col-12 my-2">
							<p class="ms-1 my-2">Select Gender: <span class="text-danger">*</span></p>
							<div class="row ms-1 pt-1">
								<div class="col-lg-6 col-md-12 col-12 ps-0 pe-0">
                                    <div class="form-check">
    									<input class="form-check-input" type="radio" name="gender"  id="male" value="0">
    									<label class="form-check-label" for="male">Male</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 ps-0">
                                    <div class="form-check">
    									<input class="form-check-input" type="radio" name="gender" id="female" value="1">
    									<label class="form-check-label" for="female">Female</label>
                                    </div>
								</div>						
                                <span class="gender_err p-0"></span>
							</div>
						</div>
                        <div class="col-lg-4 col-md-4 col-12 my-2 ps-5">
                            <p class="ms-1 my-2">Select Hobbies: <span class="text-danger">*</span></p>
                            <div class="row ps-3 pt-1">
                                <div class="col-lg-5 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]"  id="reading" value="1">
                                        <label class="form-check-label" for="reading">Reading</label>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="writing" value="2">
                                        <label class="form-check-label" for="writing">Writing</label>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="playing" value="3">
                                        <label class="form-check-label" for="playing">Playing</label>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12 col-12 ps-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="hobby[]" id="photography" value="4">
                                        <label class="form-check-label" for="photography">Photography</label>
                                    </div>
                                </div>
                            </div>
                            <span class="hobby_err p-0"></span>
                        </div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="course" class="ms-2 my-2">Select Course: <span class="text-danger">*</span></label>
							<select class="form-select" name="course" id="course">
								<option value="">--select course--</option>
								<option value="1">BCA</option>
								<option value="2">BSC/IT</option>
								<option value="3">PGDCA</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-12 my-2">
							<label for="number" class="ms-2 my-2">Enter number: <span class="text-danger">*</span></label>
							<input type="number" name="number" id="number" placeholder="Enter your Mo.number" class="form-control rounded">
						</div>
						<div class="col-lg-12 col-md-12 col-12 mt-3 mb1 text-center">
							<input type="submit" name="submit" class="btn btn-success">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- bootstrap cdn -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // validation
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
                    image : {
                        required: true
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
                    image: {
                        required : "Image is required"
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
                        minlength: "10 digits are required",
                        maxlength: "Only 10 digits are required"
                    }
                }
            });
        });
    </script>

</body>
</html>