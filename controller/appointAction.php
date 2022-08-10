<?php
	session_start();
	require "../model/user.php";

	$username = $_SESSION['username'];

	if (checkappointment($username)){
		$data = json_encode(appointment());
		$users = json_decode($data);
?>
		<table>
				<tbody>
					<tr>
						<th>Username</th>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Gender</th>
						<th>Blood Group</th>
						<th>Date</th>
						<th>Time</th>
					</tr>
					<?php 
						foreach ($users as $user) {
							if ($user->username == $username) {
						?>
						<tr>
							<td> <?= $user->username; ?> </td>
							<td> <?= $user->firstname; ?> </td>
							<td> <?= $user->lastname; ?> </td>
							<td> <?= $user->gender; ?> </td>
							<td><?=  $user->bloodgroup; ?></td>
							<td><?=  $user->day; ?></td>
							<td><?=  $user->apointment_time; ?></td>
						<?php }
						}
					?>
			    </tbody>
		</table> <?php
	}
	else {
		echo "No request made, Please make a request first and then ask for appointment";
	}
?>