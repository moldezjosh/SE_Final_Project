<?php
	// include update info file
	require_once '../include/update-info.php';
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
									<p class="btnCancel"><a href="usersetting-user.php">Cancel</a></p> </div>
								</center>
								</form>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="incomingdocu.php"><img src="../img/incoming-document.png" alt="incoming-docu-icon"><p>incoming documents</p></a></li>
							<li><a href="processingdocu.php"><img src="../img/document-icon.png" alt="processing-icon"><p>processing documents</p></a></li>
							<li><a href="processeddocu.php"><img src="../img/processed-docu.png" alt="processed-icon"><p>processed documents</p></a></li>
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
