<?php 
	// title
	$title = "Sign in";

	// header
	include "assets/includes/index_header.php";
	echo $head;

	// direct user to dashboard
	if (loggedin()) {
		header("location: home");
		exit();
	}

	// sign in
	include "assets/includes/signin.php";
?>
<body>
	<?php echo $header; ?>
	<div class="container">
		<div class="row" style="margin-top: 7rem">
			<div class="col-md-3 col-lg-3 col-xl-4"></div>
			<div class="col-md-6 col-lg-6 col-xl-4">
				<div class="card p-3 shadow border-0">
					<form id="signin_form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" enctype="multipart/form-data" accept-charset="utf-8">
						<div class="d-grid gap-3 mb-3">
							<div>
								<h5>
									<b>Welcome to back!</b>
								</h5>
								<div class="text-muted">
									Sign in to start uploading
								</div>
							</div>
							<div>
								<input id="email" name="email" type="text" class="form-control" placeholder="Email address" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" autocomplete="off" required>
							</div>
							<div>
								<input name="password" id="password" type="password" class="form-control password" placeholder="Password" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; } ?>" autocomplete="off" required>
							</div>
							<div class="d-flex justify-content-between">
								<div>
									<div class="form-check">
			              				<input type="checkbox" name="remember_me" value="yes" class="form-check-input" id="remember_me" <?php 
    								if (isset($_COOKIE["username"])) { 
    									echo "checked"; 
    								} ?>>
			              				<label class="form-check-label" for="remember_me">Remember me</label>
			            			</div>
								</div>
								<div>
									<a href="forgot_password">Forgot password</a>
								</div>
							</div>
							<?php echo $msg; ?>
							<div class="d-grid">
								<button id="signin_but" type="submit" class="btn btn-dark btn-block">Sign in</button>
							</div>
						</div>
					</form>
					<div class="text-center">
						Don't have an account? <a href="signup">Sign up</a>
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