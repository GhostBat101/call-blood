<?php
	session_start();

	require "../model/user.php";

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
		$email = isset($_POST['email']) ? test_input($_POST['email']) : "";
		$role = isset($_POST['role']) ? test_input($_POST['role']) : "";
		$_SESSION['msg'] = "";

		if (empty($username) or empty($password) or empty($firstname) or empty($lastname) or empty($gender) or empty($email) or empty($role)) {
			$_SESSION['msg'] = "Please fill up the form properly";
			header("Location: ../view/registration.php");
		}
		else {
			$isReg = register($username, $password, $firstname, $lastname, $gender, $email, $role);

			if ($isReg) {
				$_SESSION['msg'] = "";
				$_SESSION['username'] = $username;
				header("Location: ../view/login.php");
			}
			else {
				$_SESSION['msg'] = "Registration Failed...!";
				header("Location: ../view/registration.php");
			}
		}
	}
?>