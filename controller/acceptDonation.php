<?php  
	if (!isset($_SESSION['username'])) {
		header("Location: ../view/login.php");
	}
	require "../model/user.php";

	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$susername = test_input($_POST['susername']);
		if(empty($susername) or !isset($susername)){
			$_SESSION['donateErr'] = "Provide an username";
			header("Location: ../view/donate.php");
		}

		$string = accept($susername);

		if($string){
			$_SESSION['donateErr'] = "Blood accepted";
			header("Location: ../view/donate.php");
		}
	}
?>