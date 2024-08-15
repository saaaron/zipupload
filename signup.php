<?php 
	// title
	$title = "Sign up";

	// header
	include "assets/includes/index_header.php";
	echo $head;

	// direct user to dashboard
	if (loggedin()) {
		header("location: home");
		exit();
	}
?>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row" style="margin-top: 7rem">
			<div class="col-md-3 col-lg-3 col-xl-4"></div>
			<div class="col-md-6 col-lg-6 col-xl-4">
				<div class="card p-3 shadow border-0">
					<form id="signup_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
						
							<div class="mb-2">
								<h5>
									<b>Don't have an account?</b>
								</h5>
								<div class="text-muted">
									Sign up to start uploading
								</div>
								<div id="signup_msg"></div>
							</div>
						<div class="d-grid gap-3 mb-3">
							<div>
								<input id="fname" name="full_name" type="text" class="form-control" placeholder="Enter your full name" autocomplete="off" required>
								<div id="fname_val"></div>
							</div>
							<div>
								<input id="email" name="email" type="text" class="form-control" placeholder="Enter your email address" autocomplete="off" required>
								<div id="email_val"></div>
							</div>
							<div>
								<input name="password" id="password" type="password" class="form-control password" placeholder="Create a password" autocomplete="off" required>
								<div id="pass_val"></div>
							</div>
							<div class="d-grid">
								<button id="signup_but" type="submit" class="btn btn-dark btn-block">Sign up</button>
							</div>
						</div>
					</form>
					<div class="text-center">
						Already have an account? <a href="signin">Sign in</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-xl-4"></div>
		</div>
	</div>
	<?php 
		// footer
		include "assets/includes/footer.php";
	?>
</body>
</html>