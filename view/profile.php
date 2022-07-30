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
	<title>Profile</title>
	<?php include("../view/header.php"); ?>
</head>
<body>
	<p>
		Name: <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <br>
		Gender: <?php echo $_SESSION['gender']; ?><br>
		Role: <?php echo $_SESSION['role']; ?> <br>
		Email: <?php echo $_SESSION['email']; ?><br>
	</p>
	<form method="post" action="../controller/proAction.php" novalidate>
		<fieldset>
            <legend>Edit Profile</legend><br>
            <label for="uname">Username</label>
            <input type="text" autocomplete="on" name="username" id="uname" value="<?php echo $_SESSION['username']; ?>" disabled><br><br>

            <label for="fname">Firstname</label>
            <input type="text" autocomplete="on" name="firstname" id="fname" value="<?php echo $_SESSION['firstname']; ?>"><br><br>

            <label for="lname">Lastname</label>
            <input type="text" autocomplete="on" name="lastname" id="lname" value="<?php echo $_SESSION['lastname']; ?>"><br><br>

            <label for="email">Email</label>
            <input type="email" autocomplete="on" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"><br><br>


            <label for="opass">Password</label>
            <input type="password" autocomplete="off" name="oldpas" id="opass"><br><br>

            <label for="npass">New Password</label>
            <input type="password" autocomplete="off" name="newpas" id="npass"><br><br>

            <label for="cpass">Confirm New Password</label>
            <input type="password" autocomplete="off" name="conpas" id="cpass"><br><br>

            
        </fieldset><br>
        <input type="submit" name="confirm" value="Confirm"> <br>
        <p>
            <?php
            	if (isset($_SESSION['stat']) or !empty($_SESSION['stat'])) {
					echo $_SESSION['stat'];
				}
            ?>
        </p>
	</form><br><br>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>