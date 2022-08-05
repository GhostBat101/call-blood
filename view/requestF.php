<?php
	
	if (!isset($_SESSION['username'])) {
		header("Location: ../view/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request</title>
</head>
<body>
	<br><br>
	<form method="post" action= "../controller/requestFaction.php" novalidate>
		<fieldset>
			<legend>Complete the Form to request</legend>

			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname">
			<span id = "firstnameErrMsg"></span>

			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname">
			<span id = "lastnameErrMsg"></span>

			<br><br>
			<label>Gender</label>
			<input type="radio" name="gender" id="male" value="male">
			<label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="female">
			<label for="female">Female</label>
			<br>
			<span id= "genderErrMsg"></span>
			
			<br><br>
			<label>Blood Group</label><br>
			<input type="radio" name="blood" id="A+" value="A+">
			<label for="A+">A+</label><br>
			<input type="radio" name="blood" id="A-" value="A-">
			<label for="A-">A-</label><br>
			<input type="radio" name="blood" id="B+" value="B+">
			<label for="B+">B+</label><br>
			<input type="radio" name="blood" id="B-" value="B-">
			<label for="B+">B-</label><br>
			<input type="radio" name="blood" id="O+" value="O+">
			<label for="O+">O+</label><br>
			<input type="radio" name="blood" id="O-" value="O-">
			<label for="O-">O-</label><br>
			<input type="radio" name="blood" id="AB+" value="AB+">
			<label for="AB+">AB+</label><br>
			<input type="radio" name="blood" id="AB-" value="AB-">
			<label for="AB-">AB-</label><br>
			<span id ="bloodErr"></span>
		</fieldset>
		<input type="submit" name="request" value="Request">
		</fieldset><br><br>
		<?php
        	if (isset($_SESSION['rqst']) or !empty($_SESSION['rqst'])) {
				echo $_SESSION['rqst'];
			}
        ?>
	</form><br>
</body>
</html>