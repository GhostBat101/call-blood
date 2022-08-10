<?php
	session_start();
	require "../model/user.php";
	
	$_SESSION['showfeedback'] = ShowFeedback();
	header("Location: ../view/feedback.php");
?>