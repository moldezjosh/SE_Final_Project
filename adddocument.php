<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// Include config file
require_once 'include/config.php';

// Define variables and initialize with empty values
$docu_code = $docu_type = $deadline = $deli_type = $sender_name = $sender_address = $recipient = $details = "";
$docu_type_err = $deli_type_err = $sender_name_err = $sender_address_err = $recipient_err = $details_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

		//document code
		$docu_code = "2017-DTS-IN01";

    // Validate document type
		if(empty(trim($_POST["docu_type"]))){
        $docu_type_err = "Please select a document type.";
    } else{
        $docu_type = trim($_POST["docu_type"]);
    }

		//Deadline
		$month = trim($_POST["month"]);
		$day = trim($_POST["day"]);
		$year = trim($_POST["year"]);
		$deadline = $month."/".$day."/".$year;

		// Validate delivery type
		if(empty(trim($_POST["deli_type"]))){
				$deli_type_err = "Please select a delivery type.";
		} else{
				$deli_type = trim($_POST["deli_type"]);
		}

		// Validate sender name
    if(empty(trim($_POST["sender_name"]))){
        $sender_name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["sender_name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $sender_name_err = 'Please enter a valid name.';
    } else{
        $sender_name = trim($_POST["sender_name"]);
    }

		// Validate sender address
    if(empty(trim($_POST["sender_address"]))){
        $sender_address_err = "Please enter sender's address.";
    } elseif(!filter_var(trim($_POST["sender_address"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $sender_address_err = 'Please enter a valid address.';
    } else{
        $sender_address = trim($_POST["sender_address"]);
    }

		// Validate recipient
    if(empty(trim($_POST["recipient"]))){
        $recipient_err = "Please select the recipient.";
    } else{
        $recipient = trim($_POST["recipient"]);
    }

		// Validate details
    if(empty(trim($_POST["details"]))){
        $details_err = "Please enter details.";
    } else{
        $details = trim($_POST["details"]);
    }



    // Check input errors before inserting in database
    if(empty($docu_type_err)  && empty($deli_type_err)  && empty($sender_name_err)  && empty($sender_address_err)  && empty($recipient_err)  && empty($details_err) ){

        // Prepare an insert statement
        $sql = "INSERT INTO document (docu_code, docu_type, deadline, deli_type, sender_name, sender_address, recipient, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_docu_code, $param_docu_type, $param_deadline, $param_deli_type, $param_sender_name, $param_sender_address, $param_recipient, $param_details);

            // Set parameters
            $param_docu_code = $docu_code;
						$param_docu_type = $docu_type;
						$param_deadline = $deadline;
						$param_deli_type = $deli_type;
						$param_sender_name = $sender_name;
						$param_sender_address = $sender_address;
						$param_recipient = $recipient;
						$param_details = $details;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to documents page
                header("location: documents.php");
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
	<title>WebDTS</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script type="text/javascript" src="js/scripts.js"></script>

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

    <div class="search-menu">
      <form action="" method="post">
        <div class="search-div">
            <label class="search-label">Search Barcode: </label>
            <input type="text" name="search-name" id="search-name" placeholder="Search"/>
            <input type="submit" name="btnSearch" class="btnSearch" value="Search" />
        </div>
      </form>

      <div class="dropdown">
        <button onclick="dropFunc()" class="dropbtn"><?php echo $_SESSION['username']; ?></button>
        <div id="myDropdown" class="dropdown-content">
					<a href="documents.php">My Menus</a>
          <a href="usersetting-user.php">Settings</a>
          <a href="include/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="contents">
      <table>
        <tr>
          <td class="user-menu" valign="top">
            <h3 class="user-pic-label"><span>welcome</span>, <?php echo $_SESSION['username']; ?></h3>
          		<img src="img/minda-logo.png" alt="user-profile-pic">
          </td>
          <td class="am-display" rowspan="2" valign="top">
            <h3 class="nav-header">new document</h3>
              <div class="menu-display" style="height: 450px">
									<form class="forms" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
											<table class="create-table">
												<tr>
						                <td class="create-label <?php echo (!empty($docu_type_err)) ? 'has-error' : ''; ?>">
															<label>Document Type: </label></td>
						          			<td><select name="docu_type" class="sel-width">
															<option>Please Select</option>
															<option>Request</option>
															<option>Invitation</option>
															<option>Request and Invitation</option>
															<option>For Information</option>
															<option>Memorandum</option>
															<option>Purchase Requests</option>
															<option>Job Orders</option>
														</select><span class="help-block"><?php echo $docu_type_err;?></span>
														</td>
												</tr>
												<tr>
						                <td class="create-label">
															<label>Deadline: </label></td>
						          			<td><select name="month" class="dl">
															<?php
																for ($mon=1;$mon<=12;$mon++) {
																	echo '<option value="'.$mon.'">'.$mon.'</option>';
																}
															?>
														</select>
														<select name="day" class="dl">
															<?php
																for ($day=1;$day<=30;$day++) {
																	echo '<option value="'.$day.'">'.$day.'</option>';
																}
															?>
														</select>
														<select name="year" class="dl">
															<option>2017</option>
															<option>2018</option>
															<option>2019</option>
														</select>
														</td>
												</tr>
												<tr>
						                <td class="create-label <?php echo (!empty($deli_type_err)) ? 'has-error' : ''; ?>">
															<label>Delivery Type: </label></td>
						          			<td><select name="deli_type" class="sel-width">
															<option>Please Select</option>
															<option>Email</option>
															<option>Hand Carry</option>
															<option>Post Mail</option>
															<option>Fax</option>
														</select><span class="help-block"><?php echo $deli_type_err;?></span>
														</td>
												</tr>
												<tr>
					          			<td class="create-label <?php echo (!empty($sender_name_err)) ? 'has-error' : ''; ?>">
														<label>Sender Name: </label></td>
					          			<td><input type="text" name="sender_name" placeholder="Fullname" />
													<span class="help-block"><?php echo $sender_name_err;?></span></td>
												</tr>
												<tr>
					          			<td class="create-label <?php echo (!empty($sender_address_err)) ? 'has-error' : ''; ?>">
														<label>Sender Address: </label></td>
					          			<td><input type="text" name="sender_address" placeholder="Full Address" />
													<span class="help-block"><?php echo $sender_address_err;?></span></td>
												</tr>
												<tr>
						                <td class="create-label <?php echo (!empty($recipient_err)) ? 'has-error' : ''; ?>">
															<label>Recipient: </label></td>
						          			<td><select name="recipient" class="sel-width">
															<option>Please Select</option>
															<option>Kim So Jung - KMD</option>
															<option>Jung Ye Rin - LS</option>
															<option>Jung Eun Bi - FD</option>
															<option>Choi Yu Na - KMD</option>
															<option>Hwang Eun Bi - LS</option></select>
															<span class="help-block"><?php echo $recipient_err;?></span>
														</td>
												</tr>
												<tr>
					                <td class="create-label <?php echo (!empty($details_err)) ? 'has-error' : ''; ?>" valign="top">
														<label>Details: </label></td>
					                <td><textarea rows="3" cols="34" name="details" placeholder="Enter Details Here..."></textarea>
													<span class="help-block"><?php echo $details_err;?></span></td>
												</tr>
										</table>
										<center><div class="update-in-pass">
										<input type="submit" name="btnSave" class="btnOk" value="Save" />
										<p class="btnCancel"><a href="documents.php">Cancel</a></p>
									</div></center>
								</form>
              </div>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="adddocument.php"><img src="img/dashboard-icon.png" alt="dashboard-icon"><p>add document</p></a></li>
							<li><a href="documents.php"><img src="img/create-user-icon.png" alt="crate-user-icon"><p>documents</p></a></li>
							<li><a href="reports.php"><img src="img/user-setting-icon.png" alt="user-setting-icon"><p>reports</p></a></li>
						</ul>
					</div>
					</td>
					<tr>
					</tr>
        </table>
      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
