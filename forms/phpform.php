<?php

//Variables declared as empty for persisting data on the form
$fname = $lname = $email = $password = $dob = $gender = $nationality = $occupation = $website = $phone = $address = '';

//errors array to put all the error message in the array
$errors = array('fname' => '', 'lname' => '', 'email' => '', 'password' => '', 'dob' => '', 'gender' => '', 'nationality' => '', 'occupation' => '', 'website' => '', 'phone' => '', 'address' => '',);

if (isset($_POST['submit'])) {

	//first name check
	if (empty($_POST['fname'])) {
		$errors['fname'] = 'First name is required';
	} else {
		$fname = $_POST['fname'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
			$errors['fname'] = 'Name must be letters and spaces only';
		}
	}

	//last name check
	if (empty($_POST['lname'])) {
		$errors['lname'] = 'Last name is required';
	} else {
		$lname = $_POST['lname'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $lname)) {
			$errors['lname'] = 'Name must be letters and spaces only';
		}
	}

	//email check
	if (empty($_POST['email'])) {
		//this won't work because HTML already validates email for us
		$errors['email'] = 'An email is required <br />';
	} else {
		$email = $_POST['email'];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Email has to be a valid email address.";
		}
	}

	//password check.
	if (empty($_POST['password'])) {
		$errors['password'] = "You Cannot Leave Password Field Empty";
	} elseif (mb_strlen($_POST["password"]) <= 8) {
		$errors['password'] = "Your Password Must Contain At Least 8 Characters";
	} elseif (!preg_match("#[0-9]+#", $_POST["password"])) {
		$errors['password'] = "Your Password Must Contain At Least 1 Number";
	} elseif (!preg_match("#[A-Z]+#", $_POST["password"])) {
		$errors['password'] = "Your Password Must Contain At Least 1 Capital Letter";
	} elseif (!preg_match("#[a-z]+#", $_POST["password"])) {
		$errors['password'] = "Your Password Must Contain At Least 1 Lowercase Letter";
	} elseif (!preg_match("#[\W]+#", $_POST["password"])) {
		$errors['password'] = "Your Password Must Contain At Least 1 Special Character";
	} else {
		$password = md5($_POST["password"]);
	}

	//date of birth check (dob)
	if (empty($_POST['dob'])) {
		$errors['dob'] = 'Please select a date';
	} else {
		$dob = $_POST['dob'];
	}

	//gender check
	if (empty($_POST['gender'])) {
		$errors['gender'] = 'Please select your gender.';
	} else {
		$gender = $_POST['gender'];
	}

	//nationality check
	if (empty($_POST['nationality'])) {
		$errors['nationality'] = 'Nationality of the person is required <br />';
	} else {
		$nationality = $_POST['nationality'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $nationality)) {
			$errors['nationality'] = 'Nationality must be in letters only';
		}
	}

	//occupation check
	if (empty($_POST['occupation'])) {
		$errors['occupation'] = 'Cannot leave Occupation field empty';
	} else {
		$occupation = $_POST['occupation'];
		if (!preg_match('/^[a-zA-Z\s]+$/', $occupation)) {
			$errors['occupation'] = 'Occupation name must be in letters and spaces only.';
		}
	}

	//website check
	if (empty($_POST['website'])) {
		$errors['website'] = 'Cannot leave Website field empty at least put a dummy website link or just http://www.google.com';
	} else {
		$website = $_POST['website'];
		if (!preg_match('/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/m', $website)) {
			$errors['website'] = 'Website URL must be a valid URL.';
		}
	}

	//phone check
	if (empty($_POST['phone'])) {
		$errors['phone'] = 'Cannot Phone Number Field Empty.';
	} else {
		$phone = $_POST['phone'];
		if (mb_strlen($_POST['phone']) <= 10) {
			$errors['phone'] = 'A valid phone number must be 11 or 11+ digits.';
		}
	}

	//address check
	if (empty($_POST['address'])) {
		$errors['address'] = 'An address is required.';
	} else {
		$address = $_POST['address'];
		if (!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $address)) {
			$errors['address'] = 'Address must be comma separated';
		}
	}



	//if there's no error on the form (else statement will run)
	if (array_filter($errors)) {
		//echo 'errors in the form';
	} else {
		$success = "success";
	}
}


?>

<?php require_once "../templates/header.php" ?>
<main class="phpform">
	<h1><i class="icon fab fa-php"></i> PHP Form Validation</h1>
	<div class="<?php if ($success != "success") {
								echo "not-success";
							} else {
								echo "success";
							} ?>">
		<p>Success! No errors in the form! <a href="<?php echo $_SERVER['PHP_SELF']; ?>"><i class="fas refresh fa-redo"></i></a></p>
	</div>
	<form action="phpform.php" method="POST">

		<label class="form-group-label" for="fname">First Name</label><br>
		<input type="text" class="form-group" id="fname" name="fname" value="<?php echo $fname; ?>">
		<p class="error-text"><?php echo $errors['fname']; ?></p>

		<label class="form-group-label" for="lname">Last Name</label><br>
		<input type="text" id="lname" class="form-group" name="lname" value="<?php echo $lname; ?>">
		<p class="error-text"><?php echo $errors['lname']; ?></p>

		<label class="form-group-label" for="email">Email</label><br>
		<input type="email" id="email" class="form-group" name="email" value="<?php echo $email; ?>">
		<p class="error-text"><?php echo $errors['email']; ?></p>

		<label class="form-group-label" for="password">Password</label><br>
		<input type="password" id="password" class="form-group" name="password" value="<?php echo $password; ?>">
		<p class="error-text"><?php echo $errors['password']; ?></p>

		<label class="form-group-label" for="dob">Date of Birth</label><br>
		<input type="date" id="dob" class="form-group" name="dob" value="<?php echo $dob; ?>">
		<p class="error-text"><?php echo $errors['dob']; ?></p>

		<label class="form-group-label" for="gender">Gender</label><br>
		<select name="gender" class="form-group" id="gender">
			<option disabled selected>Select Your Gender</option>
			<option value="Female">Female</option>
			<option value="Male">Male</option>
		</select>
		<p class="error-text"><?php echo $errors['gender']; ?></p>

		<label class="form-group-label" for="nationality">Nationality</label><br>
		<input type="text" id="nationality" class="form-group" name="nationality" value="<?php echo $nationality; ?>">
		<p class="error-text"><?php echo $errors['nationality']; ?></p>

		<label class="form-group-label" for="occupation">Occupation</label><br>
		<input type="text" id="occupation" class="form-group" name="occupation" value="<?php echo $occupation; ?>">
		<p class="error-text"><?php echo $errors['occupation']; ?></p>

		<label class="form-group-label" for="website">Website</label><br>
		<input type="url" id="website" class="form-group" name="website" value="<?php echo $website; ?>">
		<p class="error-text"><?php echo $errors['website']; ?></p>

		<label class="form-group-label" for="phone">Phone</label><br>
		<input type="number" id="phone" class="form-group" name="phone" value="<?php echo $phone; ?>">
		<p class="error-text"><?php echo $errors['phone']; ?></p>

		<label class="form-group-label" for="address">Address</label><br>
		<input type="text" id="address" class="form-group" name="address" value="<?php echo $address; ?>">
		<p class="error-text"><?php echo $errors['address']; ?></p>

		<input type="submit" class="submit" name="submit" value="Submit">
	</form>
</main>

<?php require_once "../templates/footer.php" ?>