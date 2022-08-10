<?php 
	
	session_start();
	require "../model/user.php";

	$user = $_SESSION['username'];

	$body = $head = $Err = $msg = "";

	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$body = test_input($_POST['body']);
		$head = test_input($_POST['heading']);

		if (empty($body) && empty($head)){
			echo "Please fill up both body and header section";
		}
		else {
			$msgsent = help($user, $head, $body);

			if ($msgsent){
				echo "Message sent to the staff";
			}
			else {
				echo "Failed to send message";
			}
		}
	}

?>