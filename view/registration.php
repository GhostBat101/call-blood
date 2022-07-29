<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>
	<h1>Register</h1>

	<form method="post" action="../controller/regAction.php" novalidate>

		<label for="uname">Username:</label>
		<input type="text" name="uname" id="uname">
		<span id="unameErrorMsg"></span>
		<br><br>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"> 
		<span id="passwordErrorMsg"></span>
		<br><br>

		<input type="submit" name="submit">
	</form>

	<?php 

		if (isset($_SESSION['msg']) and !empty($_SESSION['msg'])) {
			echo $_SESSION['msg'];
		}
	?>
</body>
</html>