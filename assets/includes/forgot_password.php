<?php
    // connect to database
    include 'db_connect.php';

    if (isset($_POST['email'])) {
        $response = array();
        
        $email = $_POST['email']; // user's email address

        // check if email is already in use
        $check_email = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($db, $check_email);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_id);
        while (mysqli_stmt_fetch($stmt)) {
            // fetch results
        }
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // reset password
            $default_pass = "123456"; // default password - 123456
            $new_password = password_hash($default_pass, PASSWORD_DEFAULT);

            // `users`
            $reset_pass = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = mysqli_prepare($db, $reset_pass);
            mysqli_stmt_bind_param($stmt, "si", $new_password, $user_id);
            mysqli_stmt_execute($stmt);

            $response['msg'] = '<font class="text-success" size="2">Password reset successfully!</font>';
        } else {
            $response['msg'] = '<font class="text-danger" size="2">Email address provided does not exist in database</font>';
        }
        
        echo json_encode($response);
    }
?>