<?php
	session_start();
	if (isset($_SESSION['username']) or !empty($_SESSION['username'])) {
 		header("Location: dashboard.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>
	<script src="../view/js/check.js"></script>
	<?php include("../view/2ndheader.php"); ?>
</head>
<body>
	<form method="post" action="../controller/forgotAction.php" novalidate onsubmit="return check(this);">
		<fieldset>
			<legend>Confirm Your Information</legend>
			<label for="username">Username</label>
			<input type="text" autocomplete="on" name="username" id="username">
			<span id="unameErrorMsg"></span><br><br>

			<label for="firstname">First Name</label>
			<input type="text" name="firstname" id="firstname">
			<span id="fnameErrorMsg"></span><br><br>

			<label for="lastname">Last Name</label>
			<input type="text" name="lastname" id="lastname">
			<span id="lnameErrorMsg"></span><br><br>

			<label for="email">Last Name</label>
			<input type="email" name="email" id="email">
			<span id="emailErrorMsg"></span><br><br>

			<label>Gender</label>
			<input type="radio" name="gender" id="male" value="male">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="female">
			<label for="female">Female</label>
			<span id="genderErrMsg"></span>
			<br><br>
			<label for="role">Role</label>
			<select name="role" id="role">
				<option selected value=""> Select and option</option>
				<option value="Receiver">Receiver</option>
				<option value="Donor">Donor</option>
				<option value="Staff">Staff</option>
				<option value="Admin">Admin</option>
			</select>
			<span id="roleErr"></span><br><br>

		</fieldset>
		<br><input type="submit" name="submit" value="Check">
		<a href="login.php"><input type="button" name="login" value="Go Back"></a>
		<p id = "status">
			<?php
				if (isset($_SESSION['checkerr']) or !empty($_SESSION['checkerr'])) {
					echo $_SESSION['checkerr'];
					$_SESSION['checkerr'] = "";
				}
			?>
		</p>

	</form>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>