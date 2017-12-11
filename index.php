<?php
	session_start();

	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	  header("location: login.php");
	  exit;
	}

	// Include go back function
	require_once 'include/goback.php';

	if(strcmp($_SESSION['userType'],'Admin')!=0){
	  goback();
	}
?>
<!DOCTYPE html>
<head>
	<title>WebDTS</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
  <script type="text/javascript" src="js/scripts.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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

      <form action="results.php" method="GET">
        <div class="search-div">
            <input type="text" name="search_query"  placeholder="Track a Document"/>
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
            <h3 class="nav-header">user information</h3>
              <div class="menu-display" style="height: 300px">

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
															echo "<td class='user-name'>Username: </td>";

															while($row = mysqli_fetch_array($result)){
																			echo "<td class='user-info'>" . $row['username'] . "</td>";
																		echo "</tr>";
																		echo "<tr>";
																			echo "<td class='user-name'>Email: </td>";
																			echo "<td class='user-info'>" . $row['email'] . "</td>";
																		echo "</tr>";
																		echo "<tr>";
																			echo "<td class='user-name'>Fullname: </td>";
																			echo "<td class='user-info'>" . $row['name'] . "</td>";
																		echo "</tr>";

													echo "</table>";


									echo "<center class='update-buttons'>";
									echo "<p class='btnUpdate'><a href='updateinfo.php?id=". $row['id'] ."'>Update Information</a></p>";
									echo "<p class='btnUpdate'><a href='updatepass.php?id=". $row['id'] ."'>Update Password</a></p>";
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
        </table>
      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
