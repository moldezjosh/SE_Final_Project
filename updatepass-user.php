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
					<a href="assigneddocu.php">My Menus</a>
          <a href="usersetting-user.php">Settings</a>
          <a href="login.php">Logout</a>
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
						<h3 class="nav-header">update password</h3>
							<div class="menu-display" style="height: 350px">
								<form>
									<table class="update-info">
										<tr height="80" class="curr-pass">
												<td class="update-td">Current Password</td>
												<td class="update-textbox">
														<input type="text" name="username"/>
												</td>
										</tr>

										<tr height="80">
											<td class="update-td">New Password</td>
											<td class="update-textbox">
													<input type="text" name="email"/>
											</td>
										</tr>
									<tr height="80" valign="top">
											<td class="update-td">Repeat New Password</td>
											<td class="update-textbox">
													<input type="text" name="fullname"/>
											</td>
										</tr>

									</table>
									<center>
									<div class="update-in-pass">
									<input type="submit" name="btnSave" class="btnOk" value="Update" />
									<p class="btnCancel"><a href="usersetting-user.php">Cancel</a></p></center>
								</div>
								</form>
							</div>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="createdocu.php"><img src="img/dashboard-icon.png" alt="dashboard-icon"><p>create document</p></a></li>
							<li><a href="assigneddocu.php"><img src="img/create-user-icon.png" alt="crate-user-icon"><p>assigned document</p></a></li>
							<li><a href="office.php"><img src="img/manage-user-icon.png" alt="manage-user-icon"><p>in your office</p></a></li>
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
