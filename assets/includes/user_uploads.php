<?php 
	// var
	$uploads = "";

	// select user uploads
	$select_user = "SELECT * FROM uploads WHERE by_user_id = ? ORDER BY date_n_time DESC";
	$stmt = mysqli_prepare($db, $select_user);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// fetch results 
		$file_id = $row["unique_id"];
		$file_name = $row["file_name"];

		$uploads .= '
		<div class="col-6 col-sm-4 col-md-4 col-xl-3 mb-3 file_to_delete">
				<div class="card bg-white border-0 p-2 shadow">
					<div class="d-flex justify-content-center">
						<div class="uploads_body_zip_logo">
							<img src="assets/img/zipfile.png" alt="file icon">
						</div>
					</div>
					<div class="uploads_body_name text-center mb-2">
						<a href="file/'.$file_id.'" target="_blank">'.$file_name.'</a>
					</div>
					<div class="d-flex justify-content-center">
						<div>
							<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_file'.$file_id.'_modal"><span class="bi bi-trash"></span></button>
							<!-- delete name modal -->
							<div class="modal fade" id="delete_file'.$file_id.'_modal">
								<div class="modal-dialog modal-fullscreen-sm-down">
									<div class="modal-content rounded-3 shadow">
							      		<div class="modal-body p-4 text-center">
							        		<h5 class="mb-0">Are you sure you want to delete this file?</h5>
							      		</div>
							      		<div class="modal-footer flex-nowrap p-0">
							        		<button id="fileID_'.$file_id.'" type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end file_delete_button">
							        			<strong class="text-danger">Yes, proceed</strong>
							        		</button>
							        		<button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0" data-bs-dismiss="modal">No thanks</button>
							      		</div>
							    	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
	}

	// select user uploads
	$query = "SELECT * FROM uploads WHERE by_user_id = ?";
	if ($stmt = mysqli_prepare($db, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);
		while (mysqli_stmt_fetch($stmt)) {
			// fetch results
		}

		// $total_num_of_uploads = mysqli_stmt_num_rows($stmt);

		if (mysqli_stmt_num_rows($stmt) == 0) {
			$uploads = '
				<div class="text-center text-muted p-5">
					<div class="bi-exclamation-circle" style="font-size: 20pt;"></div>
					<p>No uploads yet!</p>
				</div>';
		}
	}
?>