<?php 
	// format time
	include "assets/includes/format_time_function.php";

	// select last file uploaded
	$last_file_up = "SELECT * FROM uploads ORDER BY date_n_time DESC LIMIT 1";
	$stmt = mysqli_prepare($db, $last_file_up);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$user_id = $row["by_user_id"];
		$file_id = $row["unique_id"];
		$time_uploaded = $row["date_n_time"];

		// select user name
		$query = "SELECT username FROM users WHERE id = ?";
		if ($stmt = mysqli_prepare($db, $query)) {
			mysqli_stmt_bind_param($stmt, "i", $user_id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $user_name);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}
		}

		$notification = '
		<div class="d-flex justify-content-center" style="margin-top: 10rem">
			<div id="home_noti_body" class="card p-3 border-0 shadow">
				<div>
					<b><span class="bi bi-bell-fill"></span> Notifications</b>
				</div>
				<div>
					<b>'.$user_name.'</b> uploaded a new <a href="file/'.$file_id.'" target="_blank">zip file</a> <span id="home_noti_time">- '.format_time($time_uploaded).'</span>
				</div>
			</div>
		</div>';
	}

	// check if uploads is not empty
	$query = "SELECT * FROM uploads";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			$notification = "";
		}
	}
?>