<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style type="text/css">
		tbody tr {
			background-color: #DAE2F4 !important;
		}
	</style>
</head>
<body style="background-color: #1E487C;">

	<?php 
		include 'connection.php';
	?>

	<div class="container">
		<div class="row mt-5 pt-5">
			<div class="col-lg-12 col-md-12 col-12 text-center mb-4">
				<h2 class="fw-bold m-0 text-white">User Details</h2>
			</div>
			<div class="col-lg-6 col-md-6 col-12 mx-auto">
				<table class="table table-bordered shadow">
					<thead class="border-light" style="background-color: #1a164f73;">
						<tr class="text-white"> 
							<th scope="col">Index</th>
							<th scope="col">Value</th>
						</tr>
					</thead>
					<tbody style="background-color: #ffffff63;" class="border-dark">
						<?php 
							$id = $_GET['id'];

							$sql = "SELECT * FROM registrations WHERE id = $id";

							$result = $conn->query($sql);

							$obj = $result->fetch_object();// fetch row data using object

							echo "<tr><th>Id</th><th>".$obj->id."</th></tr>";
							echo "<tr><td>Name</td><td>".$obj->name."</td></tr>";
							echo "<tr><td>Email</td><td>".$obj->email."</td></tr>";
							echo "<tr><td>Image</td><td>".$obj->image."</td></tr>";

							echo "<tr><td>Gender</td><td>";
							if ($obj->gender == 0) {
								echo "Male";
							} else {
								echo "Female";
							}
							echo "</td></tr>";

							echo "<tr><td>Hobbies</td><td>";
							$hobby_arr = explode(" ", $obj->hobby);

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

							echo "<tr><td>Course</td><td>";
							if ($obj->course == 1) {
								echo "BCA";
							} else if($obj->course == 2) {
								echo "BSC/IT";
							}else {
								echo "PGDCA";
							}
							echo "</td></tr>";

							echo "<tr><td>Mobile No</td><td>".$obj->mobile_no."</td></tr>";

							$conn->close();
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- bootstrap cdn -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>