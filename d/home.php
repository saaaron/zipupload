<?php 
	// title
	$title = "Welcome Back!";

	// header
	include "../assets/includes/d_header.php";
	echo $head;

	// user uploads
	include "../assets/includes/user_uploads.php";
?>
<body>
	<?php echo $header; ?>
	<div class="bg-white p-4 mb-3" style="margin-top: 3.8rem">
		<div class="d-grid gap-2">
			<div class="d-flex justify-content-center">
				<div id="user_profile_photo">
					<img src="assets/img/user.png" alt="profile photo">
				</div>
			</div>
			<div class="d-flex justify-content-center">
				<div class="me-2"><h5 id="user_name"><?php echo $full_name; ?></h5></div>
				<div>
					<a href="#edit_name" data-bs-toggle="modal" data-bs-target="#edit_name_modal"><span class="bi bi-pencil"></span></a>
					<!-- edit name modal -->
					<div class="modal fade" id="edit_name_modal">
						<div class="modal-dialog modal-fullscreen-sm-down">
							<div class="modal-content">
								<div class="modal-header p-1 pe-2 ps-2">
									<h6 class="modal-title">Edit name</h6>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div class="modal-body">
									<form id="edit_name_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
										<div class="d-grid gap-2">
											<div>
												<input id="fname" name="name" type="text" class="form-control" placeholder="Enter your name" value="<?php echo $full_name; ?>" autocomplete="off" required>
												<div id="fname_val"></div>
											</div>
											<div class="d-grid">
												<button type="submit" class="btn btn-dark btn-block">Done</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-lg-4 col-xl-4"></div>
			<div class="col-md-4 col-lg-4 col-xl-4">
				<div id="d_stats" class="d-flex justify-content-between text-center">
					<div>
						<h4 class="total_uploads">0</h4>
						<div class="d_stats_desp">Uploads</div>
					</div>
					<div>
						<h4 id="total_downloads">0</h4>
						<div class="d_stats_desp">Downloads</div>
					</div>
					<div>
						<h4 id="total_views">0</h4>
						<div class="d_stats_desp">Views</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-xl-4"></div>
		</div>
	</div>
	<div class="container">
		<div class="d-flex justify-content-between mb-2">
			<div>
				<h5>Uploads (<span class="total_uploads">0</span>)</h5>
			</div>
			<div>
				<a href="upload">
					<button class="btn btn-dark btn-sm"><span class="bi bi-upload"></span> Upload</button>
				</a>
			</div>
		</div>
		<div class="row">
			<?php echo $uploads; ?>
		</div>
	</div>
	<?php 
		// footer
		include "../assets/includes/footer.php";
	?>
</body>
</html>