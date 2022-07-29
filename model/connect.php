<?php 
	
	function connect() {
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$dbname = "call-blood";

		$conn = mysqli_connect($hostname, $username, $password, $dbname);

		return $conn;
	}
?>