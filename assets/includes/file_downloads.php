<?php 
	// connect to database
	include "db_connect.php";

	if (isset($_GET["id"])) {
		$file_id = $_GET["id"]; // file id

		// the below script only increment the file downloads :)
		// var
		$download = 1;

		// add file views
		$inc_fdownloads = "UPDATE uploads SET downloads = downloads + ? WHERE unique_id = ?";
		if ($stmt = mysqli_prepare($db, $inc_fdownloads)) {
			mysqli_stmt_bind_param($stmt, "is", $download, $file_id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
	}
?>