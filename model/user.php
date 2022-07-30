<?php 
	
	require "../model/connect.php";

	function firstname($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT firstname FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["firstname"];
			  }
		}
	}

	function changefirstname($username, $firstname){
		$conn = connect();

		if ($conn){
			$sql = $conn->prepare("UPDATE users SET firstname = ? WHERE username = ?");
			$sql->bind_param("ss", $fname, $uname);

			$fname = $firstname;
			$uname = $username;
			$sql->execute();
			return true;
		}
		return false;
	}

	function oldpass($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT password FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["password"];
			  }
		}
	}

	function lastname($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT lastname FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["lastname"];
			  }
		}
	}

	function changelastname($username, $lastname){
		$conn = connect();

		if ($conn){
			$sql = $conn->prepare("UPDATE users SET lastname = ? WHERE username = ?");
			$sql->bind_param("ss", $lname, $uname);

			$lname = $lastname;
			$uname = $username;
			$sql->execute();
			return true;
		}
		return false;
	}

	function gender($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT gender FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["gender"];
			  }
		}
	}

	function role($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT role FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["role"];
			  }
		}
	}

	function email($username){
		$conn = connect();

		if ($conn){
			$sql = "SELECT email FROM users WHERE username = '" . $username . "'";

			$res = mysqli_query($conn, $sql);
			
			while($row = $res->fetch_assoc()) {
			    return $row["email"];
			  }
		}
	}

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
			$sql = "SELECT * FROM users WHERE username = '" . $username . "'";
			$res = mysqli_query($conn, $sql);

			if (mysqli_num_rows($res) > 0){	
				return false;
			}
			return true;
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