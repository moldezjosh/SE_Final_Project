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
        <button onclick="dropFunc()" class="dropbtn">Admin</button>
        <div id="myDropdown" class="dropdown-content">
					<a href="index.php">Dashboard</a>
          <a href="usersetting.php">My Menus</a>
          <a href="login.php">Logout</a>
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
              <li class="create-img"><a href="createuser.php"><img src="img/create-user-icon.png" alt="crate-user-icon"><p>create new user</p></a></li>
              <li><a href="manageuser.php"><img src="img/manage-user-icon.png" alt="manage-user-icon"><p>manage user</p></a></li>
              <li><a href="usersetting.php"><img src="img/user-setting-icon.png" alt="user-setting-icon"><p>user setting</p></a></li>
            </ul>
          </td>
          <td class="am-display">
            <h3 class="nav-header">user information</h3>
              <div class="menu-display" style="height: 300px">
								<table class="user-setting-info">
									<tr>
										<td class="user-name">Username: </td>
										<td class="user-info">moldezjosh</td>
									</tr>
									<tr>
										<td class="user-name">Email: </td>
										<td class="user-info">j.markmoldez@gmail.com</td>
									</tr>
									<tr>
										<td class="user-name">Fullname: </td>
										<td class="user-info">Joshua Mark Moldez</td>
									</tr>
								</table>

									<center class="update-buttons">
									<p class="btnUpdate"><a href="updateinfo.php">Update Information</a></p>
									<p class="btnUpdate"><a href="updatepass.php">Update Password</a></p>
									</center>
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
