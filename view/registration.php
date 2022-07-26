<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<script src="../view/js/register_validation.js"></script>
	<link href="css/style1.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="../view/templete/style.css"> -->
	<?php include("../view/2ndheader.php"); ?>
</head>
<body>
	<h1>Register</h1>

	<form method="post" action="../controller/regAction.php" novalidate onsubmit="return validateReg(this);">

		<label for="fname">First name:</label>
		<input type="text" name="fname" id="fname">
		<span id="fnameErrorMsg"></span>
		<br><br>

		<label for="lname">Last name:</label>
		<input type="text" name="lname" id="lname">
		<span id="lnameErrorMsg"></span>
		<br><br>

		<label>Gender</label>
		<input type="radio" name="gender" id="male" value="male">
		<label for="male">Male</label>
		<input type="radio" name="gender" id="female" value="female">
		<label for="female">Female</label><br><br>
		<span id = "genderErrMsg"></span><br><br>

		<label for="uname">Username:</label>
		<input type="text" name="uname" id="uname">
		<span id="unameErrorMsg"></span>
		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"> 
		<span id="passwordErrorMsg"></span>
		<br><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email">
		<span id="emailErrorMsg"></span>
		<br><br>

		<label for="role">Role</label>
		<select name="role" id="role">
			<option selected value=""> Select and option</option>
			<option value="receiver">Receiver</option>
			<option value="donor">Donor</option>
			<option value="staff">Staff</option>
			<option value="admin">Admin</option>
		</select>
		<span id= "roleErr"></span>
		<br><br>

		<input class="button button1" type="submit" name="register" value="Register">
	</form>
	
	<br>
	<?php 

		if (isset($_SESSION['msg']) and !empty($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			$_SESSION['msg'] = "";
		}
	?>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>