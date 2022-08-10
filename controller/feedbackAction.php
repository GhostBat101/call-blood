<?php
	session_start();
	require "../model/user.php";
	if (!isset($_SESSION['username'])) {
		header("Location: login.php");
	}

	$user = $_SESSION['username'];

	$body = $head = $Err = $msg = "";

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$body = test_input($_POST['body']);
		$head = test_input($_POST['heading']);

		

		if (empty($body) || !isset($body) || empty($head) || !isset($head)){
			$_SESSION['feedbackstat'] = "Fill up the feedback form first";
			header("Location: ../controller/feedbackData.php");
		}
		else {
			$feedbacksent = feedback( $_SESSION['username'], $head, $body);
			if ($feedbacksent){
				$_SESSION['feedbackstat'] = "Feedback sent";
				header("Location: ../controller/feedbackData.php");
			}
			else {
				$_SESSION['feedbackstat'] = "Feedback failed to send";
				header("Location: ../controller/feedbackData.php");
			}
		}
		
	}
?>