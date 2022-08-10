<?php
	session_start();

	require "../model/user.php";

	$reqestdata = getAllReq();

	$_SESSION['requestdata'] = $reqestdata;

	$_SESSION['checkrole'] = checkrole($_SESSION['username']);

	header("Location: ../view/request.php");
?>