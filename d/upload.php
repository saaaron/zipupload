<?php 
	// title
	$title = "Upload file";

	// header
	include "../assets/includes/d_header.php";
	echo $head;
?>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row" style="margin-top: 7rem">
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
			<div class="col-md-6 col-lg-6 col-xl-6">
				<div class="card p-3 shadow border-0">
					<form id="upload_form" method="POST" action="assets/includes/upload_file.php" enctype="multipart/form-data" accept-charset="utf-8">
						
							<div class="mb-2">
								<h5>
									<b>Upload file!</b>
								</h5>
								<div class="text-muted">
									Only upload zip file less than 5MB
								</div>
							</div>
							<div id="upload_msg"></div>
						<div class="d-grid gap-2">
							<div>
								<input type="file" name="file" class="form-control">
							</div>
							<div class="d-grid mb-2">
								<button id="upload_but" name="upload_but" class="btn btn-dark btn-block"><span class="bi bi-upload"></span> Upload</button>
							</div>
						</div>
					</form>
					<a href="home">
						<div class="d-grid">
							<button class="btn btn-light btn-block"><span class="bi bi-reply"></span> Go back</button>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
		</div>
	</div>
	<?php 
		// footer
		include "../assets/includes/footer.php";
	?>
</body>
</html>