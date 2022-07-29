<?php

	session_start();

	require "../model/user.php";
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$username = sanitize($_POST['uname']);
		$password = sanitize($_POST['password']);
		$_SESSION['msg'] = "";
		if (empty($username) or empty($password)) {
			/*echo "Please fill up the form properly";*/
			$_SESSION['msg'] = "Please fill up the form properly";
				header("Location: ../view/login.php");
		}
		else {
			$isValid = validate($username, $password);

			if ($isValid) {
				/*echo "Login Successful";*/
				$_SESSION['msg'] = "";
				$_SESSION['username'] = $username;
				header("Location: ../view/dashboard.php");
			}
			else {
				/*echo "Login Failed";*/
				$_SESSION['msg'] = "Login Failed...!";
				header("Location: ../view/login.php");
			}
		}
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>