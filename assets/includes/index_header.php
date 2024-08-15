<?php  
	// start session
	session_start();
	
	// connect to database
	include "assets/includes/db_connect.php";

	// keep signed in
	include "assets/includes/keep_signed_in_function.php";

	if ($title == "File") {
		$path = "../";
	} else {
		$path = "";
	}

	$head = '
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="'.$description.'">
	<meta name="author" content="'.$author.'">
	<title>'.$project_name.' - '.$title.'</title>
	<link rel="icon" href="'.$path.'assets/img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="'.$path.'assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="'.$path.'assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="'.$path.'assets/css/Inter.css">
	<link rel="stylesheet" type="text/css" href="'.$path.'assets/css/Montserrat.css">
	<link rel="stylesheet" type="text/css" href="'.$path.'assets/css/style.css">
</head>';

	$header = '
	<header class="d-flex justify-content-between bg-dark fixed-top">
		<div class="img-thumbnail border-0">
			<a href="'.$path.'index">
				<img src="'.$path.'assets/img/logo.png" alt="logo">
			</a>
		</div>
		<div class="mr-0">
			<a href="'.$path.'signin">
				<button class="btn btn-outline-light"><span class="bi bi-upload"></span> Start uploading</button>
			</a>
		</div>
	</header>';
?>