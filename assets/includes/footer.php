<?php  
	if ($title == "Welcome Back!") {
		echo ''; // nothing
	} else {
		echo '
		<footer class="fixed-bottom p-4">
			<div class="text-center">
				&copy; 2024 Built by <a href="https://saaaron.github.io/" target="_blank">Sa Aaron</a>
			</div>
		</footer>';
	}

	if ($title == "File") {
		echo '
		<script src="'.$path.'assets/js/bootstrap.bundle.min.js"></script>
		<script src="'.$path.'assets/js/jquery-3.7.0.min.js"></script>
		<script src="'.$path.'assets/js/copy_share_link.js"></script>
		<script>
			$("#file_download_link").click(function(e) {
  				$.ajax({
    				url:"../assets/includes/file_downloads.php?id='.$file_id.'",
    				method:"GET",
    				cache: false,
    				dataType:"html",
    				success:function(data) {
    				  // nothing
    				}
  				});
			});
		</script>';
	} elseif ($title == "Sign up") {
		echo '
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/HideShowPassword.min.js"></script>
		<script src="assets/js/signup_validations.js"></script>
		<script src="assets/js/hide_show_password.js"></script>
		<script src="assets/js/signup.js"></script>';
	} elseif ($title == "Sign in") {
		echo '
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/HideShowPassword.min.js"></script>
		<script src="assets/js/hide_show_password.js"></script>';
	} elseif ($title == "Upload file") {
		echo '
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/jquery.form.min.js"></script>
		<script src="assets/js/upload_file.js"></script>';
	} elseif ($title == "Welcome Back!") {
		echo '
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/user_stats.js"></script>
		<script src="assets/js/signup_validations.js"></script>
		<script src="assets/js/edit_name.js"></script>
		<script>
			$(".file_delete_button").click(function(){
		        var el = this;
		        var id = this.id;
		        var splitid = id.split("_");

		        // id
		        var deleteid = splitid[1];
		        
		        $.ajax({
		            url: "assets/includes/file_delete.php",
		            type: "POST",
		            data: { file_id:deleteid },
		            success: function(response) {
		                if (response == 1) {
		                    $(el).closest(".file_to_delete").fadeOut(500, function(){
		                        $(this).remove();
		                    });
		                    $("#delete_file"+deleteid+"_modal").modal("hide");
		                } else {
		                    alert("Ops! Something went wrong, please try again");
		                }
		            }
		        });
		    });
	    </script>';
	} else {
		echo '
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		<script src="assets/js/forgot_password.js"></script>';
	}
?>