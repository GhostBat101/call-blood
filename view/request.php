<?php
	session_start();
	if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
 		header("Location: login.php");
 	}
 	if (!isset($_SESSION['requestdata']) or empty($_SESSION['requestdata'])){
 		header("Location: ../controller/requestData.php");
 	}
 	$users = $_SESSION['requestdata'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="15"> -->
	<title>Request</title>
	<?php include("../view/header.php"); ?>
	<style>
		table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
		}
	</style>
	<script src="js/request_validation.js"></script>
	<script src="js/cancel.js"></script>
	<link href="css/style1.css" rel="stylesheet" type="text/css">
	<!-- <link rel="stylesheet" href="../view/templete/style.css"> -->
</head>
<body>
	
	<?php
		$roles = $_SESSION['checkrole'];
		foreach ($roles as $role => $row) {
			foreach ($row as $key) {
				if ($key == "receiver"){
					?>
					<form method="post" action= "../controller/requestFaction.php" novalidate onsubmit="return validateReq(this);">
						<fieldset>
							<legend>Complete the Form to request</legend><br>

							<label for="firstname">First Name</label>
							<input type="text" name="firstname" id="firstname">
							<span id = "firstnameErrMsg"></span>

							<br><br>

							<label for="lastname">Last Name</label>
							<input type="text" name="lastname" id="lastname">
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
							<span id ="bloodErr"></span><br>
						</fieldset>
						<input type="submit" name="request" value="Request">
						</fieldset><br><br>
						<?php
				        	if (isset($_SESSION['rqst']) or !empty($_SESSION['rqst'])) {
								echo $_SESSION['rqst'];
							}
				        ?>
					</form><br>
					<?php

				}
			}
		}

	?>
	
	<fieldset>
		<legend>Cancel request</legend>
		<p>You can cancel the request from here</p>
		<button type="button" onclick="loadDoc()">Cancel Request</button><br><br>
		<p id="canceled"></p>
	</fieldset>
	<br><br>

	<fieldset>
		<legend>Request List</legend>
		<br>
		<table id="tbstyle">
		<tbody>
			<tr>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Gender</th>
				<th>Blood Group</th>
				<th>Date</th>
			</tr>
			<?php 
			foreach ($users as $user => $row) {
				echo "<tr>";
				foreach ($row as $key){
					echo "<td>".$key."</td>";
				}
				echo "</tr>";
			}
			?>
			
		</tbody>
	</table><br>
	</fieldset><br>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>
<?php $_SESSION['requestdata'] = "";?>