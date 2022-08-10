<?php
 	session_start();
 	if (!isset($_SESSION['username']) or empty($_SESSION['username'])) {
 		header("Location: login.php");
 	}
 	if (!isset($_SESSION['donatedata']) or empty($_SESSION['donatedata'])){
 		header("Location: ../controller/donateData.php");
 	}
 	$username = $_SESSION['username'];
 	$users = $_SESSION['donatedata'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accept</title>
	<?php include("../view/header.php"); ?>
	<style>
		table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
		}
	</style>
</head>
<body>
	<form method="post" action="../controller/acceptDonation.php" novalidate>
		<fieldset>
			<legend>User selection</legend>
			<p>Type the name of the user you want to accept the blood from</p>
			<label for="Suser">Type Username</label>
			<input type="text" name="susername" id="Suser">
			<span>
				<?php 
					if (isset($_SESSION['donateErr']) and !empty($_SESSION['donateErr'])) {
						echo $_SESSION['donateErr'];
					}
				?>
			</span><br><br>
		</fieldset>
		<br><input type="submit" name="Accept" value="Accept">
	</form><br>
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
<?php $_SESSION['donatedata'] = "";?>