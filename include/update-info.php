<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $email = $name = $position = $userType="";
$username_err = $email_err = $name_err = $position_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

		// Validate username
		$input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id, userType FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $idTmp, $userType_db);
                  if(mysqli_stmt_fetch($stmt)){
                    $userType = $userType_db;
                  }

                    $username = $input_username;
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

		// Validate email
		$input_email = trim($_POST["email"]);
		if(empty($input_email)){
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email";
    } else{
        $email = $input_email;
    }

		// Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }

		// Validate position
    $input_position = trim($_POST["position"]);
    if(empty($input_position)){
        $position_err = 'Please enter a position.';
    } else{
        $position = $input_position;
    }


    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($name_err) && empty($position_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET username=?, email=?, name=?, position=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_username, $param_email, $param_name, $param_position, $param_id);

            // Set parameters
						$param_username = $username;
            $param_email = $email;
            $param_name = $name;
            $param_position = $position;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                // Check if user is admin
                if(strcmp($userType,"Admin")==0){
                  header("location: usersetting.php");
                  exit();
                }else if(strcmp($userType,"User")==0){
                  header("location: usersetting-user.php");
                  exit();
                }else{
                  header("location: usersetting-record.php");
                  exit();
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $username = $row["username"];
                    $email = $row["email"];
                    $name = $row["name"];
										$position = $row["position"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                  //  header("location: error.php");
                  //  exit();

									echo "URL doesn't contain valid id. Redirect to error page";
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        //header("location: error.php");
      //  exit();
			echo "URL doesn't contain id parameter. ";

    }
}
?>
