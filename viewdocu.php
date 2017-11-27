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
			<div class="view-docu">
				<div class="docu-code">
					<h2>2017-DTS-IN01 <span>Processing</span></h2>
				</div>
				<table>
					<tr>
						<td>
				<div class="docu-detail">
				  <h3 class="nav-header">document details</h3>
						<div class="det-br">
							<table>
								<tr>
									<th>document type</th>
										<td>Request</td>
								</tr>
								<tr>
									<th>delivery method</th>
										<td>Email</td>
								</tr>
								<tr>
									<th>details</th>
										<td>From: Angelina Jolie of Department of Energy. This is a sample document</td>
								</tr>
								<tr>
									<th>recipient</th>
										<td>Mary Elisse Gonzales - Finance Division</td>
								</tr>
								<tr>
									<th>deadline</th>
										<td>11/28/2017</td>
								</tr>
							</table>
						</div>
				</div>
			</td>
			<td valign="top">
				<div class="attachment">
					 <h3 class="nav-header">attachments</h3>
					 <div class="at-br">
						 <table>
							 <tr>
								 <th>Filename</th>
								 <th>Action</th>
							 </tr>
							 <tr>
								 <td>Sample_Docu.pdf</td>
								 <td class="action-icons"><center>
										 <a href="#"><img src="img/view-icon.png" title="View"></a>
										 <a href="#"><img src="img/delete-ico.png" title="Delete"></a><center>
										 </td>
							 </tr>
							 <tr>
								 <td>Another_Docu.pdf</td>
								 <td class="action-icons"><center>
										 <a href="#"><img src="img/view-icon.png" title="View"></a>
										 <a href="#"><img src="img/delete-ico.png" title="Delete"></a><center>
										 </td>
							 </tr>
						 </table>
					 </div>
				 </div>
			</td>
		</tr>
	</table>

</div>
      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
