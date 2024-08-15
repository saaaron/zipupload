<?php 
	// select file
	$select_user = "SELECT * FROM uploads WHERE unique_id = ?";
	$stmt = mysqli_prepare($db, $select_user);
	mysqli_stmt_bind_param($stmt, "s", $file_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$file_name = $row["file_name"];
		$file_downloads = $row["downloads"];
		$file_views = $row["views"];

		// select file size
		$file_path = "assets/files/";
		$f_size = filesize($file_path.$file_name);

		if ($f_size >= 1048576) { // 1MB
			$set_f_size = $f_size / 1048576; // in MB
			$file_size = round($set_f_size, 0)."MB"; // file size
		} else {
			$set_f_size = $f_size / 1024; // in KB
			$file_size = round($set_f_size, 0)."KB"; // file size
		}
	}

	// if file id does not exist
	$query = "SELECT * FROM uploads WHERE unique_id = ?";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_bind_param($stmt, "s", $file_id);
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		if (mysqli_stmt_num_rows($stmt) == 0) {
			header("location: ../home"); // redirect to user dashboard
		}
	}
?>