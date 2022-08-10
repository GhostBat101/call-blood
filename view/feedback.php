<?php
	session_start();
	if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
 		header("Location: login.php");
 	}
 	if (!isset($_SESSION['showfeedback']) or empty($_SESSION['showfeedback'])){
 		header("Location: ../controller/feedbackData.php");
 	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback</title>
	<?php include("../view/header.php"); ?>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="js/feedback.js"></script>
</head>
<body>
	<fieldset>
		<legend>Send feedback</legend>
		<form method="post" action="../controller/feedbackAction.php" novalidate onsubmit="return validatefd(this);">
			<h3>Please Type the Feedback here along with the header</h3>
			<label for="heading">Heading</label><br>
			<input type="text" name="heading" id="heading">
			<span id ="headingErr"></span>
			<br><br>
			<label for="body">Body</label><br>
			<textarea id="body" name="body" rows="4" cols="50"></textarea>
			<span id ="bodyErr"></span>
			<br><br>
			
			<input type="submit" name="post" value="Post">
			
			
			<br><br>
			<h4><?php
				if (isset($_SESSION['feedbackstat']) or !empty($_SESSION['feedbackstat'])) {
					echo $_SESSION['feedbackstat'];
					$_SESSION['feedbackstat'] = "";
				}
			?></h4><br><br>

		</form>
	</fieldset><br>
	
	<?php  
		$data = $_SESSION['showfeedback'];
		$data1 = json_encode($data);
		$users = json_decode($data1);
		foreach (array_reverse($users) as $user) {
			?>
			<fieldset>
				<legend> Feedback by: <?= $user->username; ?> </legend>
				<h4><?= $user->head; ?></h4>
				<p><?= $user->body; ?></p>
				<br>
			</fieldset><br><br>
			<?php
		}
		$_SESSION['showfeedback'] = "";
	?>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>
<?php $_SESSION['requestdata'] = "";?>