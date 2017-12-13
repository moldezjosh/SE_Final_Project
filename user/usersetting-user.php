<?php
	// Include user session file
	require_once 'user-session.php';
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
            <h3 class="nav-header">user information</h3>
              <div class="menu-display" style="height: 350px">
								<?php
									// Include config file
									require_once '../include/config.php';


									// Attempt select query execution

									$user_sess = trim($_SESSION['username']);
									$sql = "SELECT * FROM users where username='$user_sess'";
									if($result = mysqli_query($link, $sql)){
											if(mysqli_num_rows($result) > 0) {
													echo "<table class='user-setting-info'>";
															echo "<tr>";
															echo "<td class='user-name'>Fullname: </td>";

															while($row = mysqli_fetch_array($result)){
																			echo "<td class='user-info'>" . $row['name'] . "</td>";
																		echo "</tr>";
																		echo "<tr>";
																			echo "<td class='user-name'>Email: </td>";
																			echo "<td class='user-info'>" . $row['email'] . "</td>";
																		echo "</tr>";
																		echo "<tr>";
																			echo "<td class='user-name'>Position: </td>";
																			echo "<td class='user-info'>" . $row['position'] . "</td>";
																		echo "</tr>";
																		echo "<tr>";
																			echo "<td class='user-name'>Office: </td>";
																			echo "<td class='user-info'>" . $row['office'] . "</td>";
																		echo "</tr>";

													echo "</table>";


									echo "<center class='update-buttons'>";
									echo "<p class='btnUpdate'><a href='updateinfo-user.php?id=". $row['id'] ."'>Update Information</a></p>";
									echo "<p class='btnUpdate'><a href='updatepass-user.php?id=". $row['id'] ."'>Update Password</a></p>";
									echo "</center>";
									}
									// Free result set
									mysqli_free_result($result);
								}
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
							}
						// Close connection
						mysqli_close($link);
					?>

              </div>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="incomingdocu.php"><img src="../img/dashboard-icon.png" alt="dashboard-icon"><p>incoming documents</p></a></li>
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
