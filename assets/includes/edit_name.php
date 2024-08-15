<?php  
	// header
	header('Content-Type: application/json');
	
	// start session
    session_start();

	// connect to database
	include "db_connect.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = $_SESSION["id"]; // user id

		// select user's name
		$query = "SELECT username FROM users WHERE id = ?";
		if ($stmt = mysqli_prepare($db, $query)) {
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $user_name);
			while (mysqli_stmt_fetch($stmt)) {
				// fetch results
			}
		}

		// full name validations
		if (empty(trim($_POST["name"]))) {
    		$full_name_error = true; // full name is empty
    	} elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["name"])) < 3) {
            $full_name_error = true; // full name must be greater than 3
        } elseif (strlen(preg_replace('/[^a-zA-Z]/m', '', $_POST["name"])) > 20) {
            $full_name_error = true; // full name must be less than 20
        } elseif (!preg_match("/^[a-zA-Z\s]{3,30}+$/ ", $_POST["name"])) {
			$full_name_error = true; // full name must be in letters, with either a space
		} else {
            $full_name = $_POST['name'];
            $full_name_error = false;
        }

        // if no changes made
        if ($user_name == $full_name) {
        	$output = array(
				'msg' => '<font class="text-warning" size="2">No changes made</font>'
			);
        } else {
			// if no errors
			if ($full_name_error == false) {
				// PREPARE INSERT STATEMENT
				// `users`
				$update = "UPDATE users SET username = ? WHERE id = ?";

				if ($stmt = mysqli_prepare($db, $update)) {
					// SET PARAMETERS
					$param_full_name = $full_name; // user's name

					// `users`
					$update = "UPDATE users SET username = ? WHERE id = ?";
					$stmt = mysqli_prepare($db, $update);
					mysqli_stmt_bind_param($stmt, "si", $param_full_name, $id);
					mysqli_stmt_execute($stmt);

					$output = array(
						'msg' => '<font class="text-success" size="2">Name changed successfully!</font>',
						'user_name' => $param_full_name
					);

					// success
				} else {
					// failed
				}	
				// close statement
				mysqli_stmt_close($stmt);		
			} else {
				$output = array(
					'msg' => '<font class="text-danger" size="2">Ops! A problem occured</font>'
				);
			}	
		}

		// encode output in json
		echo json_encode($output);

		// close db connection
  		mysqli_close($db);	
  	}
?>