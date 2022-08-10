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
	<!-- <script src="../view/js/profile_validation.js"></script> -->
    <script type="text/javascript">
        function validatePro(pForm) {
            flag = "";

            if (pForm.firstname.value == "") {
                document.getElementById("fnameErrMsg").innerHTML = "Please fill up the firstname";
                flag = "Empty";
            }
            if (pForm.lastname.value == "") {
                document.getElementById("lnameErrMsg").innerHTML = "Please fill up the lastname";
                flag = "Empty";
            }
            if (pForm.email.value == "" || pForm.email.value == null) {
                document.getElementById("emailErrMsg").innerHTML = "Please fill up the email";
                flag = "Empty";
            }

            if (flag == ""){
                return true;
            }
            
            return false;
        }
    </script>
	<link href="css/style1.css" rel="stylesheet" type="text/css">
</head>
<body>
	<p>
		Name: <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> <br>
		Username: <?php echo $_SESSION['username']; ?><br>
		Gender: <?php echo $_SESSION['gender']; ?><br>
		Role: <?php echo $_SESSION['role']; ?> <br>
		Email: <?php echo $_SESSION['email']; ?><br>
	</p>
	<form method="post" action="../controller/proAction.php" novalidate onsubmit="return validatePro(this);">
		<fieldset>
            <legend>Edit Profile</legend><br>
            <label for="username">Username</label>
            <input type="text" name="username" id="uname" value="<?php echo $_SESSION['username']; ?>" disabled>
            <br><br>

            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION['firstname']; ?>">
            <span id = "fnameErrMsg"></span>
            <br><br>

            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION['lastname']; ?>">
            <span id = "lnameErrMsg"></span><br><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>">
            <span id = "emailErrMsg"></span><br><br>


            <label for="oldpas">Password</label>
            <input type="password" name="oldpas" id="oldpas">
            <br><br>

            <label for="newpas">New Password</label>
            <input type="password" name="newpas" id="newpas">
            </span><br><br>

            <label for="conpas">Confirm New Password</label>
            <input type="password" name="conpas" id="conpas">
            </span>
            <br><br>

            
            
        </fieldset><br>
        <input type="submit" name="submit" value="Confirm"> <br><br>
        
        <p>
            <?php
            	if (isset($_SESSION['stat']) or !empty($_SESSION['stat'])) {
					echo $_SESSION['stat'];
					$_SESSION['stat'] = "";
				}
            ?>
        </p>
	</form><br><br>
</body>
<footer>
	<?php include("../view/footer.php"); ?>
</footer>
</html>