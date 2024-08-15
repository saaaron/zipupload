<?php
    // start session
    session_start();

    $id = $_SESSION['id']; // user id

    // connect to database
    include "db_connect.php";

    // generate random char 
    include "gen_random_char_function.php";
    $unique_id = random_alphanumeric_string(9); // file id

    // check if file id (unique_id) already exist
    $check = "SELECT * FROM uploads WHERE unique_id = ?";
    if ($stmt = mysqli_prepare($db, $check)) {
        mysqli_stmt_bind_param($stmt, "s", $unique_id);
        mysqli_stmt_execute($stmt);
        while (mysqli_stmt_fetch($stmt)) {
            // fetch results
        }

        // if mail id already exist
        if (mysqli_stmt_num_rows($stmt) == 1) {
            $unique_id = $unique_id.random_alphanumeric_string(3); // add random 3 char to file id
        } else {
            $unique_id = $unique_id; // file id
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // save to directory
        $save_to_dir = "../files/";

        // get file extention
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
    
        if (!file_exists($_FILES["file"]["tmp_name"])) {
            echo '<div class="alert alert-danger">File already exist</div>';
            exit();
        } elseif ($file_extension !== "zip") {
            echo '<div class="alert alert-danger">Only zip files are allowed</div>';
            exit();
        } elseif ($_FILES["file"]["size"] > 5242880) {
            echo '<div class="alert alert-danger">File size must be less than 5MB</div>';
            exit();
        } else {
            // move file to diirectory
            $zip_file = $project_name."_".$unique_id.".zip";
            move_uploaded_file($_FILES["file"]["tmp_name"], $save_to_dir.$zip_file);

            // insert into database
            // `users`
            $insert = "INSERT INTO uploads(unique_id, by_user_id, file_name) VALUES(?, ?, ?)";
            $stmt = mysqli_prepare($db, $insert);
            mysqli_stmt_bind_param($stmt, "sis", $unique_id, $id, $zip_file);
            mysqli_stmt_execute($stmt);

            echo '<div class="alert alert-success">File uploaded successfully! click <a href="file/'.$unique_id.'" target="_blank">here</a> to view</div>';
            exit();
        }
    }
?>