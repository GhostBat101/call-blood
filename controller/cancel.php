<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: ../view/login.php");
	}

	require "../model/user.php";
	
	$username = $_SESSION['username'];

	if (canceled($username)){
		$_SESSION['canceled'] = "Request canceled";
		echo "Request canceled";
	}
	else {
		echo "Failed to cancel Request";
	}
?>