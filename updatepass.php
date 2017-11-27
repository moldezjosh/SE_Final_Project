<?php
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

require_once 'include/update-pass.php';
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
            <h3 class="nav-header">update password</h3>
              <div class="menu-display" style="height: 350px">
								<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
									<table class="update-info">
										<tr height="80" class="curr-pass">
												<td class="update-td">Current Password</td>
												<td class="update-textbox">
														<input type="password" name="password" value=""/><br>
														<span class="help-block"><?php echo $password_err;?></span>
												</td>
										</tr>

										<tr height="80">
											<td class="update-td">New Password</td>
											<td class="update-textbox">
													<input type="password" name="new_password" value=""/><br>
													<span class="help-block"><?php echo $new_password_err;?></span>
											</td>
										</tr>
									<tr height="80" valign="top">
											<td class="update-td">Repeat New Password</td>
											<td class="update-textbox">
													<input type="password" name="confirm_password" value=""/><br>
													<span class="help-block"><?php echo $confirm_password_err;?></span>
											</td>
										</tr>

									</table>
									<input type="hidden" name="id" value="<?php echo $id; ?>"/>
									<center>
									<div class="update-in-pass">
									<input type="submit" name="btnSave" class="btnOk" value="Update" />
									<p class="btnCancel"><a href="usersetting.php">Cancel</a></p></center>
								</div>
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
