<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$password = $new_password = $confirm_password = "";
$password_err = $new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please your current password.";
    } else{
        $password = $input_password;

        $sql = "SELECT userType, password FROM users WHERE id=$id ";
        if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
                $hashed_password = $row['password'];
                $userType = $row['userType'];

                if(password_verify($password, $hashed_password)){
                    echo "Password matched.";
                }else{
                  $password_err = 'Password did not match.';
                }
            }
          }
          mysqli_free_result($result);
        }else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

    }

    // Validate password
    $input_new_password = trim($_POST["new_password"]);
    if(empty($input_new_password)){
        $new_password_err = "Please enter your new password.";
    } elseif(strlen(trim($_POST['new_password'])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = $input_new_password;
    }

    // Validate confirm password
    $input_confirm_password = trim($_POST["confirm_password"]);
    if(empty($input_confirm_password)){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = $input_confirm_password;
        if($new_password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if(empty($password_err) && empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
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
                    $password = $row["password"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
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
      //  header("location: error.php");
      //  exit();
      echo "URL doesn't contain id parameter. Redirect to error page";
    }
}
?>
