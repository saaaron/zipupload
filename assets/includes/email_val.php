<?php
    // connect to database
    include 'db_connect.php';

    if (isset($_POST['email'])) {
        $response = array();
        
        $email = $_POST['email']; // user's email address

        // check if email is already in use
        $check_email = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($db, $check_email);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (empty(trim($email))) {
            $response['msg'] = '<font class="text-danger" size="2">Email address is empty</font>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['msg'] = '<font class="text-danger" size="2">Email address is invalid</font>';
        } elseif (mysqli_stmt_num_rows($stmt) == 1) {
            $response['msg'] = '<font class="text-danger" size="2"><b>'.$email.'</b> is already in use</font>';
        } else {
            $response['msg'] = '';
        }
        
        echo json_encode($response);
    }
?>