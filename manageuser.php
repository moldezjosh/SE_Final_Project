<?php
	session_start();
	//require_once 'include/delete.php';
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
					<a href="index.php">Dashboard</a>
          <a href="usersetting.php">My Menus</a>
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
              <li><a href="index.php"><img src="img/dashboard-icon.png" alt="dashboard-icon"><p>dashboard</p></a></li>
              <li><a href="createuser.php"><img src="img/create-user-icon.png" alt="create-user-icon"><p>create new user</p></a></li>
              <li><a href="manageuser.php"><img src="img/manage-user-icon.png" alt="manage-user-icon"><p>manage user</p></a></li>
              <li><a href="usersetting.php"><img src="img/user-setting-icon.png" alt="user-setting-icon"><p>user setting</p></a></li>
            </ul>
          </td>
          <td class="am-display">
            <h3 class="nav-header">manage user</h3>
            <div class="menu-display" style="height: 100%">


							<?php
							// Include config file
						require_once 'include/config.php';

							// Attempt select query execution
							$sql = "SELECT * FROM users";
							if($result = mysqli_query($link, $sql)){
									if(mysqli_num_rows($result) > 0) {
										echo "<table class='user-list'>";
												echo "<tr class='user-header'>";
														echo "<th>Username</th>";
														echo "<th>Fullname</th>";
														echo "<th>Email</th>";
														echo "<th>Office</th>";
														echo "<th>Position</th>";
														echo "<th>Is Admin?</th>";
														echo "<th>Action</th>";
												echo "</tr>";
										while($row = mysqli_fetch_array($result)){
												echo "<tr class='user-data'>";
														echo "<td>". $row['username'] ."</td>";
														echo "<td class='fullname-user'>". $row['name'] ."</td>";
														echo "<td>". $row['email'] ."</td>";
														echo "<td>". $row['office'] ."</td>";
														echo "<td> Edit Position Here</td>";
														echo "<td>". $row['userType'] ."</td>"; ?>
														<td><a href="#del<?php echo $row['id']; ?>" data-toggle="modal"><img src="img/delete-ico.png" class="btn btn-info btn-lg" title="Delete"></a></td>
														<?php
														include('action.php');
												echo "</tr>";
										}
										echo "</table>";
										// Free result set
										mysqli_free_result($result);
								} else {
										echo "<p class='lead'><em>No account(s) were found.</em></p>";
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
