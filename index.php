<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style type="text/css">
		body {
			background-color: #927d749c;
		} 

		tbody {
			background-color: #ffffff63;
		}
		.user_details table {
			background-color: #e0c3c3ba;
			box-shadow:1px 1px 6px 2px rgba(0, 0, 0, 0.4);
		}
	</style>
</head>
<body>
	<?php 
		include 'connection.php';
	?>
	<div class="container">
		<div class="row my-3">
			<div class="col-lg-2 col-md-2 col-12">
				<h2 class="fw-bold m-0">User List</h2>
			</div>
			<div class='col-lg-9 col-md-8 col-12 delete-msg'>
				<p class='alert alert-danger py-2 mb-1 d-none'>Record Deleted Succesfully</p>
				<?php 
					session_start();
					// success and delete and update massage
					if (isset($_SESSION['msg'])) {
						echo "<p class='alert alert-success py-2 mb-1'>".$_SESSION['msg']."</p>";
					}
					session_destroy();
				 ?>
			</div>
			<div class="col-lg-1 col-md-1 col-2 mt-1 ms-auto">
				<a href="create.php" class="btn btn-success float-end"><i class="fa-solid fa-plus"></i></a>
			</div>
		</div>
		<div class="row user_details"></div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<table class="table table-bordered">
					<thead class="bg-dark text-white">
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Image</th>
							<th scope="col">Gender</th>
							<th scope="col">Hobbies</th>
							<th scope="col">Course</th>
							<th scope="col">Mobile Number</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody class="border border-dark">
						<?php 
							$sql = "SELECT *FROM registrations";
							$results = $conn->query($sql);

							if($results->num_rows > 0) {
								while ($rows = $results->fetch_assoc()) {
									echo "<tr><th scope='row'>".$rows["id"]."</th>";
									echo "<td>".$rows["name"]."</td>";
									echo "<td>".$rows["email"]."</td>";
                                    echo "<td style='width: 100px;'><img class='w-100' src='img/" .$rows['image'] ."'></td>";

									echo "<td>";
										if ($rows['gender'] == 0) {
											echo "Male";
										} else {
											echo "Female";
										}
									echo "</td>";

									echo "<td>";
										$hobby_arr = explode(" ", $rows['hobby']);
										foreach ($hobby_arr as $key => $value) {
											if ($value == 1) {
												echo "Reading<br>";
											}
											if ($value == 2) {
												echo "Writing<br>";
											}
											if ($value == 3) {
												echo "Playing<br>";
											}
											if ($value == 4) {
												echo "Photography";
											} 
										}
									echo "</td>";

									echo "<td>";
										if ($rows['course'] == 1) {
											echo "BCA";
										} else if ($rows['course'] == 2) {
											echo "BSC/IT";
										} else {
											echo "PGDCA";
										}
									echo "</td>";

									echo "<td>".$rows["mobile_no"]."</td>";
									echo "<td class=''>
											<a href='show.php?id=".$rows['id']."' class='btn btn-secondary show'><i class='fa-solid fa-eye'></i></a>
											<a href='edit.php?id=".$rows['id']."' class='btn btn-primary'><i class='fa-regular fa-pen-to-square'></i></a>
											<a data-id=".$rows['id']." class='btn btn-danger delete'><i class='fa-solid fa-trash-can'></i></a>
										</td>";
									echo "</tr>";
								}
							}
							mysqli_close($conn);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- bootstrap cdn -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".delete").on("click",function() {
				if (confirm("Are you really delete this record ?")) {
					var user_id = $(this).data('id');
					var element = this;
					$.ajax({
						url : "delete.php",
						type: "POST",
						data:{id : user_id},
						success: function(result){
							if (result == 1) {
								$(element).closest('tr').fadeOut("slow");
								$(".delete-msg p").removeClass("d-none");
								setTimeout(function() {
							        $(".delete-msg p").fadeOut("slow");
							    },3000);
							} else {	
								alert("Invalid user Id");
							}
						}
					});
				}
			});
			setTimeout(function() {
		        $(".delete-msg p").fadeOut("slow");
		    },3000);
		});
	</script>
</body>
</html>