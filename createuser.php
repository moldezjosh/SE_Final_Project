<?php
// Include admin session file
require_once 'admin-session.php';

// Include config file
require_once 'include/config.php';

// Define variables and initialize with empty values
$username = $email = $name = $office = $userType = $position = $password = $confirm_password = "";
$username_err = $email_err = $name_err = $office_err = $userType_err = $position_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
		// Validate email
    if(empty(trim($_POST['email']))){
        $email_err = "Please enter an email.";
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      $email_err = "Please enter a valid email";
    } else{
        $email = trim($_POST['email']);
    }

		// Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = trim($_POST["name"]);
    }

		// Validate office
    if(empty(trim($_POST["office"]))){
        $office_err = "Please select an office.";
    }else{
        $office = trim($_POST["office"]);
    }

		// Validate user type
    if(empty(trim($_POST["userType"]))){
        $userType_err = "Please select a user type.";
    } else{
        $userType = trim($_POST["userType"]);
    }

		// Validate position
    if(empty(trim($_POST["position"]))){
        $position_err = "Please enter a position.";
    } elseif(!filter_var(trim($_POST["position"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $position_err = 'Please enter a valid position.';
    } else{
        $position = trim($_POST["position"]);
    }

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err)  && empty($email_err)  && empty($name_err)  && empty($office_err)  && empty($userType_err)  && empty($position_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, name, office, userType, position, password) VALUES (?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_username, $param_email, $param_name, $param_office, $param_userType, $param_position, $param_password);

            // Set parameters
            $param_username = $username;
						$param_email = $email;
						$param_name = $name;
						$param_office = $office;
						$param_userType = $userType;
						$param_position = $position;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to manage user page
                header("location: manageuser.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
	<title>Create New User</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>
	<header>
		<div class="minda-header">
		<img src="img/minda-header.png" alt="minda-header" class="minda-banner" >
		<img src="img/minda-img.png" alt="mindanao" class="minda-logo">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</div>
	<div class="bar-line"></div>
	</header>
	<div class="wrapper">

    <div class="search-menu">

      <form action="results.php" method="GET">
        <div class="search-div">
            <input type="text" name="search_query" placeholder="Track a Document"/>
            <span><button type="submit" class="btnSearch"><img src="img/search-icon.png"></button></span>
        </div>
      </form>

      <div class="dropdown">
        <button onclick="dropFunc()" class="dropbtn"><?php echo $_SESSION['username']; ?></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="index.php">My Menus</a>
          <a href="include/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="contents">
      <table>
        <tr>
          <td class="admin-menu" valign="top">
            <h3 class="nav-header">admin menu</h3>
            <ul>
              <li><a href="createuser.php"><img src="img/create-user-icon.png" alt="create-user-icon"><p>create new user</p></a></li>
              <li><a href="manageuser.php"><img src="img/manage-user-icon.png" alt="manage-user-icon"><p>manage user</p></a></li>
              <li><a href="index.php"><img src="img/user-setting-icon.png" alt="user-setting-icon"><p>user setting</p></a></li>
            </ul>
          </td>
          <td class="am-display">
            <h3 class="nav-header">create new user</h3>
            <div class="menu-display" style="height: 100%">
              <form class="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
								<table class="create-table">
									<tr>
                <td class="create-label <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
										<label>Username: </label></td>
          			<td><input type="text" name="username" id="user" placeholder="Username" value="<?php echo $username; ?>"/>
                <span class="help-block"><?php echo $username_err;?></span></td>
							</tr>
							<tr>
          			<td class="create-label <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"><label>Email: </label></td>
          			<td><input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>"/>
                <span class="help-block"><?php echo $email_err;?></span></td>
							</tr>
							<tr>
                <td class="create-label  <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
										<label>Fullname: </label></td>
          			<td><input type="text" name="name" id="name" placeholder="Fullname" value="<?php echo $name; ?>"/>
                <span class="help-block"><?php echo $name_err;?></span></td>
							</tr>
							<tr>
                <td class="create-label <?php echo (!empty($office_err)) ? 'has-error' : ''; ?>"><label>Office/Department: </label></td>
          			<td><select name="office" class="sel-width" value="<?php echo $office; ?>">
									<option>(please select:)</option>
									<option>Knowledge Management Division</option>
									<option>Legal Services</option>
                  <option>Administrative Division</option>
                  <option>Finance Division</option>
                  <option>Procurement Division</option>
                  <option>Human Resource Management Unit</option>
                  <option>Record Office</option>
									</select>
                  <span class="help-block"><?php echo $office_err;?></span></td>
							</tr>
							<tr>
								<td class="create-label <?php echo (!empty($userType_err)) ? 'has-error' : ''; ?>"><label>User Type: </label></td>
          			<td><select name="userType" class="sel-width" value="<?php echo $userType; ?>">
									<option>(please select:)</option>
                  <option>Records Officer</option>
									<option>User</option></select>
                  <span class="help-block"><?php echo $userType_err;?></span></td>
							</tr>
							<tr>
                <td class="create-label <?php echo (!empty($position_err)) ? 'has-error' : ''; ?>">
									<label>Position: </label></td>
                <td><input type="text" name="position" id="position" placeholder="Position" value="<?php echo $position; ?>"/>
                <span class="help-block"><?php echo $position_err;?></span></td>
							</tr>
							<tr>
                <td class="create-label <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
									<label>Password: </label></td>
          			<td><input type="password" name="password" id="pass" value="<?php echo $password; ?>"/>
                <span class="help-block"><?php echo $password_err;?></span></td>
							</tr>
							<tr>
          			<td class="create-label <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
									<label>Re-type Password:</label></td>
          			<td><input type="password" name="confirm_password" id="repass" value="<?php echo $confirm_password; ?>"/>
                <span class="help-block"><?php echo $confirm_password_err;?></span></td>
							</tr>
							</table>
								<center><div class="update-in-pass">
								<input type="submit" name="btnSave" class="btnOk" value="Save" />
								<p class="btnCancel"><a href="index.php">Cancel</a></p>
							</div></center>
              </form>
            </div>
          </td>
        </tr>
      </table>
    </div>

  </div>
      <footer class="footer">
    			<center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
    	</footer>
  </body>
</html>
