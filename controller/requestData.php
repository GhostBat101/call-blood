<?php
	session_start();

	require "../model/user.php";

	$reqestdata = getAllReq();

	$_SESSION['requestdata'] = $reqestdata;

	header("Location: ../view/request.php");
?>