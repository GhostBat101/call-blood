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
	<meta http-equiv="refresh" content="15">
	<title>Request</title>
	<?php include("../view/header.php"); ?>
	<style>
		table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
		}
	</style>
</head>
<body>
	<br><br>
	<fieldset>
		<legend>Complete the form to request: </legend>
		<form>
			
		</form>
	</fieldset>
	<br><br>
	<fieldset>
		<legend>Request List</legend>
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
	</table>
	</fieldset><br>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>
<?php $_SESSION['requestdata'] = ""; ?>