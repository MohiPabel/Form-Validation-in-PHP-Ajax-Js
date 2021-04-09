<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Font awesome cdn -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">

	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

	<!-- Lu Logo near title-->
	<link rel="icon" type="image/png" href="../assets/img/wpforms.png" />
	<title>Form Validation</title>

	<!-- jQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Js Validation Script -->
	<script defer src="js/script.js"></script>
</head>

<body>
	<header>
		<nav>
			<ul>
				<li><a href="../index.html"><i class="icon fab fa-2x fa-wpforms"></i></a></li>
				<li><a href="../index.html">Home</a></li>
				<li><a href="../forms/phpform.php">PHP</a></li>
				<li><a href="../forms/ajaxform.php">Ajax</a></li>
				<li><a href="../forms/jsform.php">JavaScript</a></li>
			</ul>
		</nav>
	</header>
	<main class="jsform">
		<h1><i class="icon fab fa-js"></i> JavaScript Form Validation</h1>
		<form id="form" action="" method="POST">

			<label class="form-group-label" for="fname">First Name</label><br>
			<input type="text" class="form-group" id="fname" name="fname" value="">


			<label class="form-group-label" for="lname">Last Name</label><br>
			<input type="text" id="lname" class="form-group" name="lname" value="">


			<label class="form-group-label" for="email">Email</label><br>
			<input type="email" id="email" class="form-group" name="email" value="">


			<label class="form-group-label" for="password">Password</label><br>
			<input type="password" id="password" class="form-group" name="password" value="">


			<label class="form-group-label" for="dob">Date of Birth</label><br>
			<input type="date" id="dob" class="form-group" name="dob" value="">


			<label class="form-group-label" for="gender">Gender</label><br>
			<select name="gender" class="form-group" id="gender">
				<option disabled selected>Select Your Gender</option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
			</select>


			<label class="form-group-label" for="nationality">Nationality</label><br>
			<input type="text" id="nationality" class="form-group" name="nationality" value="">


			<label class="form-group-label" for="occupation">Occupation</label><br>
			<input type="text" id="occupation" class="form-group" name="occupation" value="">


			<label class="form-group-label" for="website">Website</label><br>
			<input type="url" id="website" class="form-group" name="website" value="">


			<label class="form-group-label" for="phone">Phone</label><br>
			<input type="number" id="phone" class="form-group" name="phone" value="">


			<label class="form-group-label" for="address">Address</label><br>
			<input type="text" id="address" class="form-group" name="address" value="">


			<input type="submit" id="submit" class="submit" name="submit" value="Submit">

			<p id="form-message" class="form-message"></p>
		</form>
	</main>

	<?php require_once "../templates/footer.php" ?>