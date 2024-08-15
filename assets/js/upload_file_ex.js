$(document).ready(function () {
    $('#upload_but').click(function (event) {
        event.preventDefault();  // Prevent the default form submission

        // Check if the file input is empty
        if ($("input[name='file']").val() == "") {
            $("#upload_msg").show();
            $("#upload_msg").html("<div class='alert alert-danger'>File is empty</div>");
            return false;
        }

        // Create a FormData object and append the file
        var formData = new FormData($('#upload_form')[0]);

        $.ajax({
            url: 'assets/includes/upload_file.php', // PHP script to handle the file upload
            type: 'POST',
            data: formData,
            contentType: false,  // Important for file uploads
            processData: false,  // Important for file uploads
            success: function (response) {
                // Display the response from the server
                $("#upload_msg").html(response);
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
                $("#upload_msg").show();
                $("#upload_msg").html("<div class='alert alert-danger'>Problem in uploading file.</div>");
            }
        });
    });
});
