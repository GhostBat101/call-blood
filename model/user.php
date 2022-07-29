<?php 
	
	require "../model/connect.php";

	function validate($username, $password) {

		$conn = connect();

		if ($conn) {

			$sql = "SELECT id FROM users WHERE username = '" . $username . "' and password = '" . $password . "'";

			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) === 1) 
				return true;
			return false;
		}
	}

	function checkusername($username){
		$conn = connect();
		if ($conn){
			$sql = "SELECT id FROM users WHERE username = '" . $username . "'";
			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) === 1) 
				return true;
			return false;
		}
	}

	function register($username, $password, $firstname, $lastname, $gender, $email, $role){
		$conn = connect();

		if ($conn){
			$sql = $conn->prepare("INSERT INTO users (username,firstname, lastname, gender, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$sql->bind_param("sssssss", $uname,$fname, $lname, $g, $mail, $pass, $roles);

			$uname = $username;
			$fname = $firstname;
			$lname = $lastname;
			$g = $gender;
			$mail = $email;
			$pass = $password;
			$roles = $role;

			$sql->execute();

			return true;
		}
		return false;
	}

	function get($id) {
		$conn = connect();

		if ($conn) {
			$stmt = $conn->prepare("SELECT id, username, password, email FROM users WHERE id = ?");
			$stmt->bind_param("i", $uid);

			$uid = $id;
			$stmt->execute();

			/*$stmt->bind_result($i, $u, $p, $e);

			while($stmt->fetch) {
				echo $i . " " . $u;
			}*/
		}
	}

	function getAll() {

		$conn = connect();

		if ($conn) {
			$sql = "SELECT id, username, password, email FROM users";

			$res = mysqli_query($conn, $sql);

			$users = array();

			if ($res->num_rows > 0) {
				while($row = $res->fetch_assoc()) {
					array_push($users, $row);
				}

				return $users;
			}
		}

		return array();
	}
?>