<?php 
	session_start();
 	if (!empty($_SESSION['username'])) {
 		header("Location: dashboard.php");
 	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<script src="js/login_validation.js"></script>
</head>
<body>

	<h1>Login</h1>

	<form method="post" action="../controller/loginAction.php" novalidate onsubmit="return validate(this);">

		<label for="uname">Username:</label>
		<input type="text" name="uname" id="uname">
		<span id="unameErrorMsg"></span>
		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"> 
		<span id="passwordErrorMsg"></span>
		<br><br>

		<input type="submit" name="submit" value="Login">
		<a href="../view/registration.php"><input type="button" name="registration" value="Register"></a>
	</form>

	<?php 

		if (isset($_SESSION['login']) and !empty($_SESSION['login'])) {
			echo $_SESSION['login'];
		}
	?>

</body>
</html>