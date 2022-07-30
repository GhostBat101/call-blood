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
	<title>Welcome</title>
</head>
<body>

	<h1>Welcome</h1>

	<br><br>


	<a href="../controller/Logout.php">Logout</a>

</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>