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
        <button onclick="dropFunc()" class="dropbtn">User</button>
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
              <li><a href="createuser.php"><img src="img/create-user-icon.png" alt="create-user-icon"><p>create new user</p></a></li>
              <li><a href="manageuser.php"><img src="img/manage-user-icon.png" alt="manage-user-icon"><p>manage user</p></a></li>
              <li><a href="usersetting.php"><img src="img/user-setting-icon.png" alt="user-setting-icon"><p>user setting</p></a></li>
            </ul>
          </td>
          <td class="am-display">
            <h3 class="nav-header">manage user</h3>
            <div class="menu-display" style="height: 450px">
								<table class="user-list">
									<tr class="user-header">
										<th>ID</th>
										<th>Fullname</th>
										<th>Email</th>
										<th>Office</th>
										<th>Position</th>
										<th>Is Admin?</th>
										<th>Action</th>
									</tr>
									<tr class="user-data">
										<td>maryelisse</td>
										<td class="fullname-user">mary elisse gonzales</td>
										<td>maryelisse@gmail.com</td>
										<td>BUDGET</td>
										<td>Edit Position Here</td>
										<td>user</td>
										<td><a href=""><img src="img/delete-ico.png" title="Delete"></a></td>
									</tr>
								</table>
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
