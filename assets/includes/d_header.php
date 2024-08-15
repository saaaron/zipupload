<?php  
	// start session
	session_start();

	// user's session
	if (isset($_SESSION["id"])) {
    	$id = $_SESSION['id'];
    }

    // connect to database
	include "../assets/includes/db_connect.php";

	// keep user logged in function
	include "../assets/includes/keep_signed_in_function.php";

	// if user's ID session or cookie email is null redirect user back to index page
	if (!loggedin()) {
		header("location: index");
		exit();
	}

	// select user
	include "../assets/includes/user_info.php";

	$head = '
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="'.$author.'">
	<title>'.$title.'</title>
	<link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Inter.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Montserrat.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>';

	$header = '
	<header class="d-flex justify-content-between bg-dark fixed-top">
		<div class="img-thumbnail border-0">
			<a href="home">
				<img src="assets/img/logo.png" alt="logo">
			</a>
		</div>
		<div class="mr-0">
			<div class="dropdown">
				<a href="#menu" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expended="false">
					<button class="btn btn-outline-light"><span class="bi bi-person-circle"></span> <span id="h_user_name">'.$full_name.'</span> <span class="bi bi-three-dots-vertical"></span></button>
				</a>
				<ul class="dropdown-menu p-2 shadow" style="width: 200px;">
			    	<li><a class="dropdown-item rounded-2 mb-1" href="upload"><span class="bi bi-upload"></span> Upload</a></li>
					<li><a class="dropdown-item rounded-2 text-danger" href="logout"><span class="bi-door-open"></span> Logout</a></li>
			    </ul>
			</div>
		</div>
	</header>';
?>