<?php

	session_start();

	require "../model/user.php";
	
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$username = sanitize($_POST['uname']);
		$password = sanitize($_POST['password']);
		$_SESSION['login'] = "";
		if (empty($username) or empty($password)) {
			$_SESSION['login'] = "Please fill up the form properly";
				header("Location: ../view/login.php");
		}
		else {
			$isValid = validate($username, $password);

			if ($isValid) {
				$_SESSION['login'] = "";
				$_SESSION['username'] = $username;
				$_SESSION['firstname'] = firstname($username);
				$_SESSION['lastname'] = lastname($username);
				$_SESSION['gender'] = gender($username);
				$_SESSION['email'] = email($username);
				$_SESSION['role'] = role($username);
				header("Location: ../view/dashboard.php");
			}
			else {
				$_SESSION['login'] = "Login Failed...!";
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