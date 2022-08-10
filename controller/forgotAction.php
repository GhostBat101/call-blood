<?php
	session_start();
	require "../model/user.php";
	$username = $firstname = $lastname = $gender = $role = $stat = '';

	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = test_input($_POST['username']);
		$firstname = test_input($_POST['firstname']);
		$lastname = test_input($_POST['lastname']);
		$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
		$email = isset($_POST['email']) ? test_input($_POST['email']) : "";
		$role = isset($_POST['role']) ? test_input($_POST['role']) : "";

		sleep(5);

		$isThere = validateAll($username, $firstname, $lastname, $gender, $email, $role);

		if ($isThere){
			$_SESSION['username'] = $username;
			$_SESSION['firstname'] = firstname($username);
			$_SESSION['lastname'] = lastname($username);
			$_SESSION['gender'] = gender($username);
			$_SESSION['email'] = email($username);
			$_SESSION['role'] = role($username);
			echo "<br>Provided information found on the database, you will be redirected shortly.";
		}
		else {
			$_SESSION['checkerr'] = "<br>Provided information not found on the database";
		}
		
	}
?>