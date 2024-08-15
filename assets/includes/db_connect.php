<?php
	$db = mysqli_connect('localhost', 'root', '', 'zipupload');

	// Evaluate connection
	if(mysqli_connect_errno()) {
		echo 'Ops! A problem occured while trying to connect to database';
		exit();
	}

	// project info
	$project_name = "Zipupload"; // project's name
	$description = "Easy file sharing"; // project's description
	$author = "Sa Aaron"; // project's author
?>
