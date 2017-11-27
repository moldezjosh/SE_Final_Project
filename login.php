<?php
	require_once 'include/config.php';
	// Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = "";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){

	    // Check if username is empty
	    if(empty(trim($_POST["username"]))){
	        $username_err = 'Please enter your username.';
	    } else{
	        $username = trim($_POST["username"]);
	    }

	    // Check if password is empty
	    if(empty(trim($_POST['password']))){
	        $password_err = 'Please enter your password.';
	    } else{
	        $password = trim($_POST['password']);
	    }

	    // Validate credentials
	    if(empty($username_err) && empty($password_err)){
	        // Prepare a select statement
	        $sql = "SELECT username, password, userType FROM users WHERE username = ?";

	        if($stmt = mysqli_prepare($link, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "s", $param_username);

	            // Set parameters
	            $param_username = $username;

	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                // Store result
	                mysqli_stmt_store_result($stmt);

	                // Check if username exists, if yes then verify password
	                if(mysqli_stmt_num_rows($stmt) == 1){
	                    // Bind result variables
	                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $userType);

	                    if(mysqli_stmt_fetch($stmt)){
	                        if(password_verify($password, $hashed_password)){
	                            /* Password is correct, so start a new session and
	                            save the username to the session */
	                            session_start();
	                            $_SESSION['username'] = $username;

															// Check if user is admin
															if(strcmp($userType,"Admin")==0){
																header("location: index.php");
																exit();
															}else{
																header("location: usersetting-user.php");
																exit();
															}

	                        } else{
	                            // Display an error message if password is not valid
	                            $password_err = 'Incorrect Password';
	                        }
	                    }
	                } else{
	                    // Display an error message if username doesn't exist
	                    $username_err = 'No account found with that username.';
	                }
	            } else{
	                echo "Oops! Something went wrong. Please try again later.";
	            }
	        }

	        // Close statement
	        mysqli_stmt_close($stmt);
	    }

	    // Close connection
	    mysqli_close($link);
	}
	?>

<!DOCTYPE html>
<head>
	<title>WebDTS</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
	<header>
		<div class="minda-header">
		<img src="img/minda-header.png" alt="minda-header" class="minda-banner" >
		<img src="img/minda-img.png" alt="mindanao" class="minda-logo">
	</div>
	<div class="bar-line"></div>
	</header>
	<div class="wrapper">
			<table class="layout-table">
				<tr>
				<td class="banner" style="width: 510px" valign="top" >
						<center><img src="img/banner-dts.jpg" alt="banner" id="banner-dts"></center>
						<h2>MinDA Web-Based Document Tracking System</h2>
						<p>Welcome to the new Web-Based Document Tracking System of Mindanao Development Authority. This can make an electronic copy of the incoming documents in MinDA which can be easily monitor the status of the said documents. Through using a document tracking system, MinDA now has the ease of access in their documents. </p>
				</td>

				<td class="login-td" style="width: 251px" valign="top" >
					<div  class="login">
						<h3 class="tb-title">Login</h3>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
								<div class="field-up <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

										<center><input type="text" name="username" class="input-txt" value="<?php echo $username; ?>" placeholder="Username"/><br>
										<span><?php echo $username_err; ?></span></center>
								</div>
								<div class="field-up <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
										<center><input type="password" name="password" class="input-txt" placeholder="Password"/><br>
										<span><?php echo $password_err; ?></span></center>
								</div>

								<center><input type="submit" name="btnLogin" class="btnLogin" value="Login" /></center>
							</form>

					</div></td>


				</tr>
			</table>
	</div>

	<footer class="footer">
			<center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
	</footer>

</body>
</html>
