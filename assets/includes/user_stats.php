<?php  
	// header
	header('Content-Type: application/json');

	// connect to database
	include "db_connect.php";

	// if (isset($_SESSION)) {
		// start session
		session_start();
		
		$id = $_SESSION['id']; // user id

		// select user uploads
		$query = "SELECT * FROM uploads WHERE by_user_id = ?";
		if ($stmt = mysqli_prepare($db, $query)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			while (mysqli_stmt_fetch($stmt)) {
			 	// fetch results
			}

			if (mysqli_stmt_num_rows($stmt) == 0) { // print 0 all
				$total_num_of_uploads = 0;
				$total_downloads = 0;
				$total_views = 0;
			} else {
				// print count
				$query = "SELECT sum(downloads) AS downloads, sum(views) AS views FROM uploads WHERE by_user_id = ?";
				if ($stmt = mysqli_prepare($db, $query)) {
					mysqli_stmt_bind_param($stmt, "i", $id);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $total_downloads, $total_views);
					while (mysqli_stmt_fetch($stmt)) {
					 	// fetch results
					}

					$total_num_of_uploads = mysqli_stmt_num_rows($stmt);
				}
			}
		}

		// data (notification and total notification)
		$data = array(
	        'total_uploads'  => $total_num_of_uploads,
	        'total_downloads' => $total_downloads,
	        'total_views' => $total_views
	    );

	    // data (encoded with json)
    	echo json_encode($data);

	    // close statement
		mysqli_stmt_close($stmt);
	// }
	// close db connection
  	mysqli_close($db);
?>