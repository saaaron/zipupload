$("#edit_name_form").submit(function(e){		
	e.preventDefault();			
	$.ajax({
		url: 'assets/includes/edit_name.php',
		type: 'POST',
		data: $(this).serialize(),
		dataType: "json",
		success: function(d) {
			$("#fname_val").html(d.msg);
			$('#h_user_name').html(d.user_name);
			$('#user_name').html(d.user_name);
		}
	});
});