<?php
// Initialize the session
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
            <h3 class="user-pic-label"><span>welcome</span>, user</h3>
          		<img src="img/minda-logo.png" alt="user-profile-pic">
          </td>
          <td class="am-display" rowspan="2" valign="top">
            <h3 class="nav-header">user information</h3>
              <div class="menu-display" style="height: 350px">
								<?php
									// Include config file
									require_once 'include/config.php';


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
