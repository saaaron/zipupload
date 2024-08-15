<?php 
	// the below script only increment the file views :)
	// var
	$view = 1;

	// add file views
	$inc_fviews = "UPDATE uploads SET views = views + ? WHERE unique_id = ?";
	if ($stmt = mysqli_prepare($db, $inc_fviews)) {
		mysqli_stmt_bind_param($stmt, "is", $view, $file_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
?>