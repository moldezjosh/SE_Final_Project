<?php
// Initialize the session
session_start();


// Include config file
require_once '../include/config.php';

// Define variables and initialize with empty values
$docu_code = $docu_type = $deadline = $deli_type = $sender_name = $sender_address = $recipient = $details = $status = "";
$docu_type_err = $deli_type_err = $sender_name_err = $sender_address_err = $recipient_err = $details_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

		//document code
		$docu_code = "2017-DTS-IN-";

    // Validate document type
		if(empty(trim($_POST["docu_type"]))){
        $docu_type_err = "Please select a document type.";
    } else{
        $docu_type = trim($_POST["docu_type"]);
    }

		//Deadline

		$deadline = trim($_POST["deadline"]);

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

		// status
		$status = trim($_POST["status"]);

		//recipient id
		$reci_name = $recipient;
		$ex_reci = explode(" -",$reci_name);
		$reci_name = $ex_reci[0];
		$sql = "SELECT id FROM users WHERE name='$reci_name'";
		if($result = mysqli_query($link, $sql)){
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_array($result)){
						$reci_id = $row['id'];
					}
				}
		}

    // Check input errors before inserting in database
    if(empty($docu_type_err)  && empty($deli_type_err)  && empty($sender_name_err)  && empty($sender_address_err)  && empty($recipient_err)  && empty($details_err) ){

        // Prepare an insert statement
        $sql = "INSERT INTO document (docu_code, docu_type, deadline, deli_type, sender_name, sender_address, recipient, reci_id, details, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_docu_code, $param_docu_type, $param_deadline, $param_deli_type, $param_sender_name, $param_sender_address, $param_recipient, $param_reci_id, $param_details, $param_status);

            // Set parameters
            $param_docu_code = $docu_code;
						$param_docu_type = $docu_type;
						$param_deadline = $deadline;
						$param_deli_type = $deli_type;
						$param_sender_name = $sender_name;
						$param_sender_address = $sender_address;
						$param_recipient = $recipient;
						$param_reci_id = $reci_id;
						$param_details = $details;
						$param_status = $status;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
							$sql = "SELECT docu_id FROM document ORDER BY docu_id DESC LIMIT 1";
							if($result = mysqli_query($link, $sql)){
									if(mysqli_num_rows($result) > 0) {
										while($row = mysqli_fetch_array($result)){
											$docu_id = $row['docu_id'];
										}
									}
							}
							$num = "";
							if(($docu_id>0) && ($docu_id<=9)){
								$num = "0000".$docu_id;
							}else if(($docu_id>=10) && ($docu_id<=99)){
								$num = "000".$docu_id;
							}else if(($docu_id>=100) && ($docu_id<=999)){
								$num = "00".$docu_id;
							}else if(($docu_id>=1000) && ($docu_id<=9999)){
								$num = "0".$docu_id;
							}

							$up_docu_code = "2017-DTS-IN-".$num;

							mysqli_query($link,"UPDATE document SET docu_code='$up_docu_code' WHERE docu_id=$docu_id");

                // Redirect to documents page
                header("location: documents.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
				require_once '../include/addtran.php';


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
	<link rel="stylesheet" type="text/css" href="../css/styles.css" />
  <script type="text/javascript" src="../js/scripts.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="minda-header">
		<img src="../img/minda-header.png" alt="minda-header" class="minda-banner" >
		<img src="../img/minda-img.png" alt="mindanao" class="minda-logo">
	</div>
	<div class="bar-line"></div>
	</header>
	<div class="wrapper">

		<div class="search-menu">

      <form action="../results.php" method="GET">
        <div class="search-div">
            <input type="text" name="search_query"  placeholder="Track a Document"/>
            <span><button type="submit" class="btnSearch"><img src="../img/search-icon.png"></button></span>
        </div>
      </form>

      <div class="dropdown">
        <button onclick="dropFunc()" class="dropbtn"><?php echo $_SESSION['username']; ?></button>
        <div id="myDropdown" class="dropdown-content">
          <a href="usersetting-record.php">Settings</a>
          <a href="../include/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="contents">
      <table>
        <tr>
          <td class="user-menu" valign="top">
            <h3 class="user-pic-label"><span>Welcome</span>, <?php echo $_SESSION['username']; ?></h3>
          		<img src="../img/minda-logo.png" alt="user-profile-pic">
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
						          			<td><input type="date" name="deadline"/></td>
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
                      <?php
                							// Include config file
                						require_once '../include/config.php';

                            function initials($str) {
                                $ret = '';
                                foreach (explode(' ', $str) as $word)
                                    $ret .= strtoupper($word[0]);
                                return $ret;
                            }

                							// Attempt select query execution
                							$sql = "SELECT name, office, userType FROM users WHERE userType='User' ORDER BY name ASC";
                							if($result = mysqli_query($link, $sql)){
                									if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_array($result)){
																				  echo "<option>". $row['name'] . " - ". initials($row['office']) ."</option>";
                                    }
                                    // Free result set
                										mysqli_free_result($result);
                                  }
                                }

                                // Close connection
                    						mysqli_close($link);
                              ?> </select>
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
										<input type="hidden" name="status" value="1" />
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
							<li><a href="adddocument.php"><img src="../img/dashboard-icon.png" alt="dashboard-icon"><p>add document</p></a></li>
							<li><a href="documents.php"><img src="../img/create-user-icon.png" alt="crate-user-icon"><p>documents</p></a></li>
							<li><a href="reports.php"><img src="../img/user-setting-icon.png" alt="user-setting-icon"><p>reports</p></a></li>
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
