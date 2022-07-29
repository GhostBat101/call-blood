<?php
	session_start();

	require "../model/User.php";

	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = test_input($_POST['uname']);
		$password = test_input($_POST['password']);

		$firstname = test_input($_POST['fname']);
		$lastname = test_input($_POST['lname']);
		$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
		$email = test_input($_POST('email'));
		$role = isset($_POST['role']) ? test_input($_POST['role']) : "";
		$_SESSION['msg'] = "";

		if (empty($username) or empty($password) or empty($firstname) or empty($lastname) or empty($gender) or empty($email) or empty($role)) {
			$_SESSION['msg'] = "Please fill up the form properly";
				header("Location: ../view/login.php");
		}
		else {
			$isValid = validate($username, $password);

			if ($isValid) {
				$_SESSION['msg'] = "";
				$_SESSION['username'] = $username;
				header("Location: ../view/welcome.php");
			}
			else {
				$_SESSION['msg'] = "Login Failed...!";
				header("Location: ../view/login.php");
			}
		}
	}
?>