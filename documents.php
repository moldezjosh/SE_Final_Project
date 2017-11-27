<?php
	session_start();


	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: login.php");
	  exit;
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
            <h3 class="nav-header">all documents</h3>
              <div class="menu-display" style="height: 350px">

								<table class="user-list">
									<tr class="user-header">
										<th>Code</th>
										<th>Type</th>
										<th>Sender</th>
										<th>Recipient</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<?php
									// Include config file
								require_once 'include/config.php';

									// Attempt select query execution
									$sql = "SELECT * FROM document";
									if($result = mysqli_query($link, $sql)){
											if(mysqli_num_rows($result) > 0) {
													while($row = mysqli_fetch_array($result)){
																	echo "<tr class='user-data'>";
																	echo "<td>" . $row['docu_code'] . "</td>";
																	echo "<td>" . $row['docu_type'] . "</td>";
																	echo "<td>". $row['sender_name'] . "</td>";
																	echo "<td>". $row['recipient'] ."</td>";
																	echo "<td>". $row['dateAdded'] ."</td>";
																	echo "<td>Pending</td>";
																	echo "<td class='action-icons'>
																			<a href='viewdocu.php?docu_id=". $row['docu_id'] ."'><img src='img/view-icon.png' title='View'></a>
																			<a href='#'><img src='img/delete-ico.png' title='Delete'></a>
																			</td>";
																echo "</tr>";
															}
														mysqli_free_result($result);
													} else {
																							//echo "<p class='lead'><em>No document(s) were found.</em></p>";
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
