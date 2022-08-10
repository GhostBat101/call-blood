<?php
	session_start();

	require "../model/user.php";

	$reqestdata = getAllDon();

	$_SESSION['donatedata'] = $reqestdata;

	header("Location: ../view/donate.php");
?>