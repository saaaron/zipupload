<?php 
	// select user
	$select_user = "SELECT * FROM users WHERE id = ?";
	$stmt = mysqli_prepare($db, $select_user);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$full_name = $row["username"];
	}
?>