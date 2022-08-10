<?php
 	session_start();
 	if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
 		header("Location: login.php");
 	}
 	$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<?php include("../view/header.php"); ?>
	<link rel="stylesheet" href="../view/templete/style.css">
</head>
<body>

	<!-- <h1>Welcome <?php //echo $username; ?></h1> -->

	<img style="padding-left:100px;padding-top:25px;padding-bottom:20px;" src="../model/image/save.png" alt="logo" width="200" height="160" >


	<h3 style="padding-left:100px; color:red"> Donate Blood</h3>
	<br>
	<p style="padding-left: 100px;padding-right: 200px; ">
		Across Bangladesh, every day there remains an urgent need for all types of blood groups. Especially donors with rare blood groups such as O Negative, B Negative and A Negative are in high demand. Your timely response is essential to the supply of healthy blood for the massive daily demand we face.

		Your donation can save the lives of many, make a difference or simply make you feel great about your contribution to humanity. Whatever your reason, whatever your motivation we welcome you to learn more about eligibility and benefits of donating blood with a trusted organization like us.

		Find out more about local blood drives and BDRCS campaigns near you. Donate blood, save lives.
		<h4 style="padding-left:100px;padding-bottom: 200px;"></h4>
	</p>



	

</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>