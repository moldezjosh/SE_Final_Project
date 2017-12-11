<?php
	session_start();

	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: ../login.php");
	  exit;
	}

	// Include go back function
	require_once '../include/goback.php';

	if(strcmp($_SESSION['userType'],'User')!=0){
	  goback();
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
          <a href="usersetting-user.php">Settings</a>
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
						<?php
						// Include config file
					require_once '../include/config.php';


						$user_session = $_SESSION['username'];
						$sql = "SELECT id FROM users WHERE username='$user_session'";

						if($stmt = mysqli_prepare($link, $sql)){
							// Attempt to execute the prepared statement
							if(mysqli_stmt_execute($stmt)){
									$result = mysqli_stmt_get_result($stmt);

										if(mysqli_num_rows($result) == 1){
												$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
												$id = $row['id'];
										}
							}
						}
						// Close statement
						mysqli_stmt_close($stmt);

						$sql = "SELECT count(docu_id) AS docuCount FROM recipient WHERE reci_id=$id AND status=3";
						if($stmt = mysqli_prepare($link, $sql)){
							// Attempt to execute the prepared statement
							if(mysqli_stmt_execute($stmt)){
									$result = mysqli_stmt_get_result($stmt);
										if(mysqli_num_rows($result) == 1){
												$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
												$docuCount = $row['docuCount'];
										}
							}
						}
						// Close statement
						mysqli_stmt_close($stmt);
						 ?>
            <h3 class="nav-header">all processing documents<span class="badge badge-light"><?php echo $docuCount; ?></span></h3>
              <div class="menu-display" style="height: 350px">

								<table class="user-list" style="width: 100%">
									<tr class="user-header">
										<th>Transaction ID</th>
										<th>Type</th>
										<th>Sender</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
									<?php

									// Attempt select query execution
									$sql = "SELECT * from document LEFT JOIN recipient ON document.docu_id=recipient.docu_id WHERE recipient.status=3 AND recipient.reci_id=$id ORDER BY document.docu_id DESC";
									if($result = mysqli_query($link, $sql)){
											if(mysqli_num_rows($result) > 0) {
													while($row = mysqli_fetch_array($result)){
																	echo "<tr class='user-data'>";
																	echo "<td>" . $row['docu_code'] . "</td>";
																	echo "<td>" . $row['docu_type'] . "</td>";
																	echo "<td>". $row['sender_name'] . "</td>";
																	echo "<td>". $row['dateAdded'] ."</td>";
																	echo "<td class='action-icons'>
																			<a href='viewdocu.php?docu_id=". $row['docu_id'] ."&from=2'><img src='../img/view-icon.png' title='View'></a>
																			</td>";
																echo "</tr>";
															}
														mysqli_free_result($result);
													} else {
														?>
														<tr>
															<td colspan="7">No Document(s) Found</td>
														</tr>
														<?php
														}
										} else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
											}
												// Close connection
												mysqli_close($link);
										?>
								</table>

              </div>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="incomingdocu.php?"><img src="../img/dashboard-icon.png" alt="dashboard-icon"><p>incoming documents</p></a></li>
							<li><a href="processingdocu.php"><img src="../img/create-user-icon.png" alt="crate-user-icon"><p>processing documents</p></a></li>
							<li><a href="processeddocu.php"><img src="../img/user-setting-icon.png" alt="user-setting-icon"><p>processed documents</p></a></li>
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
