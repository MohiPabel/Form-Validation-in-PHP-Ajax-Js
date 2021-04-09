<?php

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $nationality = $_POST['nationality'];
  $occupation = $_POST['occupation'];
  $website = $_POST['website'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];


  // Variables declared as false to check errors
  $errorEmpty = $errorFname = $errorLname = $errorEmail = $errorPass = $errorDob = $errorGender = $errorNation = $errorOccupation = $errorWebsite = $errorPhone = $errorAddress = false;

  // If all input field is empty:
  if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($dob) || empty($gender) || empty($nationality) || empty($occupation) || empty($website) || empty($phone) || empty($address)) {
    echo "<span class='form-error'>Please fill in all the fields!</span>";
    $errorEmpty = true;
  }
  // First name check
  elseif (!preg_match('/^[a-zA-Z\s]+$/', $fname)) {
    echo "<span class='form-error'>Firstname must be in letters and spaces only.</span>";
    $errorFname = true;
  }
  // Last name check
  elseif (!preg_match('/^[a-zA-Z\s]+$/', $lname)) {
    echo "<span class='form-error'>Lastname must be in letters and spaces only.</span>";
    $errorLname = true;
  }
  // Email check
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<span class='form-error'>Write a valid email address!</span>";
    $errorEmail = true;
  }
  // Password check
  elseif (strlen($password) <= 8) {
    echo "<span class='form-error'>Password must be at least 8 characters long!</span>";
    $errorPass = true;
  } elseif (!preg_match("#[0-9]+#", $password)) {
    echo "<span class='form-error'>Password Must Contain At Least 1 Number!</span>";
    $errorPass = true;
  } elseif (!preg_match("#[A-Z]+#", $password)) {
    echo "<span class='form-error'>Password Must Contain At Least 1 Capital Letter!</span>";
    $errorPass = true;
  } elseif (!preg_match("#[a-z]+#", $password)) {
    echo "<span class='form-error'>Password Must Contain At Least 1 Lowercase Letter!</span>";
    $errorPass = true;
  } elseif (!preg_match("#[\W]+#", $password)) {
    echo "<span class='form-error'>Password Must Contain At Least 1 Special Character!</span>";
    $errorPass = true;
  } 
  // Nationality check
  elseif (!preg_match('/^[a-zA-Z\s]+$/', $nationality)) {
    echo "<span class='form-error'>Nationality must be in letters only!</span>";
    $errorNation = true;
  } 
  // Occupation check
  elseif (!preg_match('/^[a-zA-Z\s]+$/', $occupation)) {
    echo "<span class='form-error'>Occupation name must be in letters and spaces only!</span>";
    $errorOccupation = true;
  } 
  // Website check
  elseif (!preg_match('/^((ftp|http|https):\/\/)?(www.)?(?!.*(ftp|http|https|www.))[a-zA-Z0-9_-]+(\.[a-zA-Z]+)+((\/)[\w#]+)*(\/\w+\?[a-zA-Z0-9_]+=\w+(&[a-zA-Z0-9_]+=\w+)*)?$/m', $website)) {
    echo "<span class='form-error'>Website URL must be a valid URL!</span>";
    $errorWebsite = true;
  } 
  // Phone number check
  elseif (strlen($phone) <= 10) {
    echo "<span class='form-error'>A valid phone number must be 11 or 11+ digits!</span>";
    $errorPhone = true;
  } 
  // Address check
  elseif (!preg_match('/^([a-zA-Z0-9\s]+)(,\s*[a-zA-Z0-9\s]*)*$/', $address)) {
    echo "<span class='form-error'>Address must be comma separated!</span>";
    $errorAddress = true;
  } 
  // If theres errors in the form
  else {
    $password = md5($_POST["password"]);
    echo "<span class='form-success'>No errors in the form! <a href='ajaxform.php'><i class='fas refresh fa-redo'></i></a></span>";
    // echo "<script>window.location.href='../index.php';</script>";
  }
} 
// If code do not run
else {
  echo "There was an error!";
}
?>
<script>

  // By default the class for red border is removed
  $("#fname, #lname, #email, #password, #dob, #gender, #nationality, #occupation, #website, #phone, #address").removeClass("input-error");

  // PHP error values kept in Js form
  var errorEmpty = "<?php echo $errorEmpty; ?>";
  var errorEmail = "<?php echo $errorEmail; ?>";
  var errorFname = "<?php echo $errorFname; ?>";
  var errorLname = "<?php echo $errorLname; ?>";
  var errorPass = "<?php echo $errorPass; ?>";
  var errorNation = "<?php echo $errorNation; ?>";
  var errorOccupation = "<?php echo $errorOccupation; ?>";
  var errorWebsite = "<?php echo $errorWebsite; ?>";
  var errorPhone = "<?php echo $errorPhone; ?>";
  var errorAddress = "<?php echo $errorAddress; ?>";

  // If there are errors, add the class 'input-error'
  if (errorEmpty == true) {
    $("#fname, #lname, #email, #password, #dob, #gender, #nationality, #occupation, #website, #phone, #address").addClass("input-error");
  }
  if (errorEmail == true) {
    $("#email").addClass("input-error");
  }
  if (errorFname == true) {
    $("#fname").addClass("input-error");
  }
  if (errorLname == true) {
    $("#lname").addClass("input-error");
  }
  if (errorPass == true) {
    $("#password").addClass("input-error");
  }
  if (errorNation == true) {
    $("#nationality").addClass("input-error");
  }
  if (errorOccupation == true) {
    $("#occupation").addClass("input-error");
  }
  if (errorWebsite == true) {
    $("#website").addClass("input-error");
  }
  if (errorPhone == true) {
    $("#phone").addClass("input-error");
  }
  if (errorAddress == true) {
    $("#address").addClass("input-error");
  }

  // If there's no error, clear the input fields value
  if (errorEmpty == false && errorEmail == false && errorFname == false && errorLname == false && errorPass == false && errorNation == false && errorOccupation == false && errorWebsite == false && errorPhone == false && errorAddress == false) {
    $("#fname, #lname, #email, #password, #dob, #gender, #nationality, #occupation, #website, #phone, #address").val("");
  }
</script>