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
		date_default_timezone_set('Asia/Dhaka');
		$firstname = test_input($_POST['firstname']);
		$lastname = test_input($_POST['lastname']);
		$gender = isset($_POST['gender']) ? test_input($_POST['gender']) : "";
		$blood = isset($_POST['blood']) ? test_input($_POST['blood']) : "";
		$date = date("Y-m-d");
		$date = strval($date);
		$username = $_SESSION['username'];


		$_SESSION['rqst'] = "";

		if (empty($firstname) or empty($lastname) or empty($gender) or empty($blood)) {
			$_SESSION['rqst'] = "Please fill up the form to make a request";
			header("Location: ../view/request.php");
		}
		else{
			if (!checkreq($username)){
				$_SESSION['rqst'] = "One request per user at a time.";
				header("Location: ../view/request.php");
			}
			else {
				$inReq = requestblood($username, $firstname, $lastname, $gender, $blood, $date);

				if ($inReq) {
					$_SESSION['rqst'] = "Blood requested.";
					header("Location: ../view/request.php");
				}
				else {
					$_SESSION['rqst'] = "Request Failed...!";
					header("Location: ../view/request.php");
				}
			}
			
		}
	}
?>