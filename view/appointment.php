<?php  
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}
	$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Appointment</title>
	<header><?php require("header.php"); ?></header>
	<style>
		table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
		}
	</style>
	<script src="js/appoint.js"></script>
</head>
<body>
	
	<fieldset>
		<legend>Appointment</legend>
		<p>Cilck on the 'Ask for Appointment' if you have requested for blood or accepted blood already.</p><br>
		<button type="button" onclick="loadDoc()">Ask for Appointment</button><br><br>
	</fieldset><br><br>
	<fieldset>
		<p id="appointment"></p>
	</fieldset><br><br>
	
</body>
<footer><?php require("footer.php"); ?></footer>
</html>