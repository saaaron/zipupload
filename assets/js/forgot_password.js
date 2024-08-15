$("#fp_form").submit(function(e){		
	e.preventDefault();			
	$.ajax({
		url: 'assets/includes/forgot_password.php',
		type: 'POST',
		data: $(this).serialize(),
		dataType: "json",
		success: function(d) {
			$("#email_val").html(d.msg);
		}
	});
});