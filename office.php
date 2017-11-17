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
            <h3 class="nav-header">all documents in your office - knowledge development division</h3>
              <div class="menu-display" style="height: 350px">
								<div class="search-document">
									<form action="" method="post">
									<div class="search-div">
											<input type="text" name="search-name" class="search-name" placeholder="Search"/>
											<input type="submit" name="btnSearch" class="btnSearch" value="Search" />
									</div>
								</form>

								<table class="user-list">
									<tr class="user-header">
										<th>Barcode</th>
										<th>Sender</th>
										<th>Document Type</th>
										<th>Note</th>
										<th>Date  </th>
										<th>Action</th>
										<th>Status</th>
									</tr>
									<tr class="user-data">
										<td>702649</td>
										<td class="fullname-user">human resource management</td>
										<td>Communication Letters</td>
										<td>lorem ipsum dolor</td>
										<td>Oct 29</td>
										<td class="action-icons">
												<a href="#"><img src="img/view-icon.png" title="View">
												<a href="#"><img src="img/reply-ico.png" title="Reply">
												<a href="#"><img src="img/finish-icon.png" title="Finish">
												<a href="#"><img src="img/delete-ico.png" title="Delete">
												</td>
										<td><div class="status"><p>Pending</p></div></td>

									</tr>
								</table>
							</div>
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
