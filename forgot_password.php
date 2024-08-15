<?php 
	// title
	$title = "Forgot password";

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
					<form id="fp_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="d-grid gap-3">
							<div>
								<h5>
									<b>Forgot your password?</b>
								</h5>
								<div class="text-muted" style="text-align: justify">
									This is an open source project, PHP mailer is not enabled for recovery of forgotten password so input your email address below to reset your password to <b>123456</b>.
								</div>
							</div>
							<div>
								<input id="email" name="email" type="text" class="form-control" placeholder="Email address" autocomplete="off" required>
								<div id="email_val"></div>
							</div>
							<div class="d-grid mb-3">
								<button id="signin_but" type="submit" class="btn btn-dark btn-block">Done</button>
							</div>
						</div>
					</form>
					<div class="text-center">
						<a href="signin">Sign in</a> / <a href="signup">Sign up</a>
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