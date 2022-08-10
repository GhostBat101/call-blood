<?php
	require ("../model/user.php");
	session_start();
	$username = $_SESSION['username'];

	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$oldpass = oldpass($username);
		$password = test_input($_POST['oldpas']);

		$oldfirstname = firstname($username);
		$oldlastname = lastname($username);
		$oldemail = email($username);

		$newemail = isset($_POST['email']) ? test_input($_POST['email']) : "";
		$newfirstname = test_input($_POST['firstname']);
		$newlastname = test_input($_POST['lastname']);

		$newpass = test_input($_POST['newpas']);
		$conpass = test_input($_POST['conpas']);

		if (empty($newfirstname) || empty($newlastname) || empty($newemail)){
			$_SESSION['stat'] = "Firstname, lastname and email can't be empty.";
			header("Location: ../view/profile.php");
		}
		else {

			if ($newfirstname !=$oldfirstname or $newlastname != $oldlastname or $newemail != $oldemail or !empty($newpass)){
				if ($newfirstname != $oldfirstname){
					if (!empty($password)){
						if ($password == $oldpass){
							$isChanged = changefirstname($username, $newfirstname);
							if ($isChanged){
								$_SESSION['firstname'] = $newfirstname;
								$_SESSION['stat'] = "Changes saved";
								header("Location: ../view/profile.php");
							}
							else {
								$_SESSION['stat'] = "Changes failed";
								header("Location: ../view/profile.php");
							}
						}
						else {
							$_SESSION['stat'] = "Please provide correct password to make changes";
							header("Location: ../view/profile.php");
						}
					}
					else {
						$_SESSION['stat'] = "Please provide password to make changes";
						header("Location: ../view/profile.php");
					}
				}

				if ($newlastname != $oldlastname){
					if (!empty($password)){
						if ($password == $oldpass){
							$isChanged = changelastname($username, $newlastname);
							if ($isChanged){
								$_SESSION['lastname'] = $newlastname;
								$_SESSION['stat'] = "Changes saved";
								header("Location: ../view/profile.php");
							}
							else {
								$_SESSION['stat'] = "Changes failed";
								header("Location: ../view/profile.php");
							}
						}
						else {
							$_SESSION['stat'] = "Please provide correct password to make changes";
							header("Location: ../view/profile.php");
						}
					}
					else {
						$_SESSION['stat'] = "Please provide password to make changes";
						header("Location: ../view/profile.php");
					}
				}

				if ($newemail != $oldemail){
					if (!empty($password)){
						if ($password == $oldpass){
							if (!empty($newemail) and checkemail($newemail)){
								$isChanged = changeemail($username, $newemail);
								if ($isChanged){
									$_SESSION['email'] = $newemail;
									$_SESSION['stat'] = "Changes saved";
									header("Location: ../view/profile.php");
								}
								else {
									$_SESSION['stat'] = "Changes failed";
									header("Location: ../view/profile.php");
								}
							}
							else {
								$_SESSION['stat'] = "Email not Valid";
								header("Location: ../view/profile.php");
							}
						}
						else {
							$_SESSION['stat'] = "Please provide correct password to make changes";
							header("Location: ../view/profile.php");
						}
					}
					else {
						$_SESSION['stat'] = "Please provide password to make changes";
						header("Location: ../view/profile.php");
					}
				}

				if ($newpass != $oldpass){
					if (!empty($password)){
						if ($password == $oldpass){
							if (!empty($newpass)){
								if ($newpass == $conpass){
									$isChanged = changepass($username, $newpass);
									if ($isChanged){
										$_SESSION['stat'] = "Changes saved";
										header("Location: ../view/profile.php");
									}
									else {
										$_SESSION['stat'] = "Changes failed";
										header("Location: ../view/profile.php");
									}
								}
								else{
									$_SESSION['stat'] = "Confirm the New password again";
									header("Location: ../view/profile.php");
								}
							}
						}
						else {
							$_SESSION['stat'] = "Please provide correct password to make changes";
							header("Location: ../view/profile.php");
						}
					}
					else {
						$_SESSION['stat'] = "Please provide password to make changes";
						header("Location: ../view/profile.php");
					}
				}
			}
			else {
				$_SESSION['stat'] = "Nothing changed.";
				header("Location: ../view/profile.php");
			}

		}
	}
?>