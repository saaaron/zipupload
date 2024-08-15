<?php 
	// title
	$title = "File";

	// get file id
	if (isset($_GET["id"])) {
		if ($_GET["id"] == null) {
			header("location: ../home"); // redirect to user dashboard
		} else {
			$file_id = $_GET["id"]; // file id
		}
	} else {
		header("location: ../home"); // redirect to user dashboard
	}

	// header
	include "assets/includes/index_header.php";
	echo $head;

	// file
	include "assets/includes/file.php";

	// views
	include "assets/includes/file_views.php";
?>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row" style="margin-top: 7rem">
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
			<div class="col-md-6 col-lg-6 col-xl-6">
				<div class="card p-3 shadow border-0">
					<div class="d-grid gap-1">
						<div class="d-flex justify-content-center">
							<div id="zip_file_download_logo">
								<img src="../assets/img/zipfile.png" alt="file logo">
							</div>
						</div>
						<div>
							<b>File name: </b><?php echo $file_name; ?>
						</div>
						<div>
							<b>Size: </b><?php echo $file_size; ?>
						</div>
						<div>
							<b>Downloads: </b><?php echo $file_downloads; ?>
						</div>
						<div>
							<b>Views: </b><?php echo $file_views; ?>
						</div>
						<a href="../<?php echo $file_path.$file_name; ?>" id="file_download_link">
							<div class="d-grid">
								<button class="btn btn-dark btn-block">Download</button>
							</div>
						</a>
						<div class="d-grid">
							<button class="btn btn-light btn-block" data-bs-toggle="modal" data-bs-target="#share_file_modal"><span class="bi bi-share"></span> Share</button>
							<!-- share file modal -->
							<div class="modal fade" id="share_file_modal">
								<div class="modal-dialog modal-fullscreen-sm-down">
									<div class="modal-content">
										<div class="modal-header p-1 pe-2 ps-2">
											<h6 class="modal-title">Share file</h6>
											<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
										</div>
										<div class="modal-body">
											<div class="d-grid gap-2">
												<div>
													<input type="text" id="share_link" class="form-control" value="http://localhost/zipupload/file/<?php echo $file_id; ?>">
												</div>
												<div class="d-grid">
													<button type="submit" class="btn btn-dark btn-block" onclick="copy_to_clipboard()">Copy</button>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-xl-3"></div>
		</div>
	</div>
	<?php 
		// footer
		include "assets/includes/footer.php";
	?>
</body>
</html>