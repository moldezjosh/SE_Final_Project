<?php

session_start();
require_once 'include/update-info.php';

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
            <h3 class="nav-header">update information</h3>
              <div class="menu-display" style="height: 350px">
								<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
									<table class="update-info">
										<tr height="70" valign="bottom">
												<td class="update-td">Username</td>
												<td class="update-textbox">
														<input type="text" name="username" value="<?php echo $username; ?>"/><br>
														<span class="help-block"><?php echo $username_err;?></span>
												</td>
										</tr>
										<tr height="60">
											<td class="update-td">Email</td>
											<td class="update-textbox">
													<input type="text" name="email" value="<?php echo $email; ?>"/><br>
													<span class="help-block"><?php echo $email_err;?></span>
											</td>
										</tr>
										<tr height="60">
											<td class="update-td">Fullname</td>
											<td class="update-textbox">
													<input type="text" name="name" value="<?php echo $name; ?>"/><br>
													<span class="help-block"><?php echo $name_err;?></span>
											</td>
										</tr>
										<tr height="70" valign="top">
											<td class="update-td">Position</td>
											<td class="update-textbox">
													<input type="text" name="position" value="<?php echo $position; ?>"/><br>
													<span class="help-block"><?php echo $position_err;?></span>
											</td>
										</tr>
									</table>

									<input type="hidden" name="id" value="<?php echo $id; ?>"/>
									<center>
									<div class="update-in-pass">
									<input type="submit" name="btnSave" class="btnOk" value="Update" />
									<p class="btnCancel"><a href="index.php">Cancel</a></p> </div>
								</center>
								</form>
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
