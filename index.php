<?php 
	// title
	$title = "Easy file sharing";

	// header
	include "assets/includes/index_header.php";
	echo $head;

	// last file uploaded notification
	include "assets/includes/index_file_notification.php";

	// direct user to dashboard
	if (loggedin()) {
		header("location: home");
		exit();
	}
?>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div style="margin-top: 7rem">
			<div class="text-center">
				<h1 id="desp_header">Easy file sharing</h1>
				<p><?php echo $project_name; ?> is an open-source platform that lets you upload and share zip files less than 5MB effortlessly</p>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<a href="signin">
				<button class="btn btn-outline-dark"><span class="bi bi-upload"></span> Start uploading</button>
			</a>
		</div>
		<?php echo $notification; ?>
	</div>
	<?php 
		// footer
		include "assets/includes/footer.php";
	?>
</body>
</html>