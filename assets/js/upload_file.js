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
            url: 'assets/includes/upload_file.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $("#upload_but").attr('disabled', true);
                $("#upload_but").html('<span class="spinner-border text-light" role="status"></span> Uploading...');
            },
            success: function (response) {
                // Display the response from the server
                $("#upload_msg").html(response);
                $("input[name='file']").val('');
                $("#upload_but").attr('disabled', false);
                $("#upload_but").html('<span class="bi bi-upload"></span> Upload');
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
                $("#upload_msg").show();
                $("#upload_msg").html("<div class='alert alert-danger'>Problem in uploading file.</div>");
                $("#upload_but").attr('disabled', false);
                $("#upload_but").html('<span class="bi bi-upload"></span> Upload');
            }
        });
    });
});
