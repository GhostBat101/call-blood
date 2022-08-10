<?php
	session_start();
	if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
 		header("Location: login.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Help</title>
	<header><?php require("header.php"); ?></header>
	<script src="../view/js/help.js"></script>
</head>
<body>
	<form method="post" action="../model/helpAction.php" novalidate onsubmit="return help(this);">
		<h3>Please Type your message here along with the header</h3>
		<label for="heading">Heading</label><br>
		<input type="text" name="heading" id="heading">
		<span id = "headERR"></span>
		<br><br>
		<label for="body">Body</label><br>
		<textarea id="body" name="body" rows="4" cols="50"></textarea>
		<span id = "bodyErr"></span>
		<br><br>
		
		<input type="submit" name="post" value="Post">
		
		
		<br><br>
		<h4 id = "helpmsg"></h6><br><br>

	</form>
</body>
<footer><?php require("footer.php"); ?></footer>
</html>