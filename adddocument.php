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
					<a href="documents.php">My Menus</a>
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
            <h3 class="nav-header">new document</h3>
              <div class="menu-display" style="height: 450px">
									<form class="forms" method="post">
											<table class="create-table">
												<tr>
						                <td class="create-label"><label>Document Type: </label></td>
						          			<td><select name="docu_type" class="sel-width">
															<option>Please Select</option>
															<option>Request</option>
															<option>Invitation</option>
															<option>Request and Invitation</option>
															<option>For Information</option>
															<option>Memorandum</option>
															<option>Purchase Requests</option>
															<option>Job Orders</option>
														</select>
														</td>
												</tr>
												<tr>
						                <td class="create-label"><label>Deadline: </label></td>
						          			<td><select name="month" class="dl">
															<?php
																for ($mon=1;$mon<=12;$mon++) {
																	echo '<option value="'.$mon.'">'.$mon.'</option>';
																}
															?>
														</select>
														<select name="day" class="dl">
															<?php
																for ($day=1;$day<=30;$day++) {
																	echo '<option value="'.$day.'">'.$day.'</option>';
																}
															?>
														</select>
														<select name="year" class="dl">
															<option>2017</option>
															<option>2018</option>
															<option>2019</option>
														</select>
														</td>
												</tr>
												<tr>
						                <td class="create-label"><label>Delivery Type: </label></td>
						          			<td><select name="deli_type" class="sel-width">
															<option>Please Select</option>
															<option>Email</option>
															<option>Hand Carry</option>
															<option>Post Mail</option>
															<option>Fax</option>
															</select>
														</td>
												</tr>
												<tr>
					          			<td class="create-label"><label>Sender Name: </label></td>
					          			<td><input type="text" name="sender_name" placeholder="Fullname" /></td>
												</tr>
												<tr>
					          			<td class="create-label"><label>Sender Address: </label></td>
					          			<td><input type="text" name="sender_address" placeholder="Full Address" /></td>
												</tr>
												<tr>
						                <td class="create-label"><label>Recipient: </label></td>
						          			<td><select name="recipient" class="sel-width">
															<option>Please Select</option>
															<option>Kim So Jung - KMD</option>
															<option>Jung Ye Rin - LS</option>
															<option>Jung Eun Bi - FD</option>
															<option>Choi Yu Na - KMD</option>
															<option>Hwang Eun Bi - LS</option></select>
														</td>
												</tr>
												<tr>
					                <td class="create-label" valign="top"><label>Details: </label></td>
					                <td><textarea rows="3" cols="34" name="remarks" placeholder="Enter Details Here..."></textarea></td>
												</tr>
										</table>
										<center><div class="update-in-pass">
										<input type="submit" name="btnSave" class="btnOk" value="Save" />
										<p class="btnCancel"><a href="documents.php">Cancel</a></p>
									</div></center>
								</form>
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
