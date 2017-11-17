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

		<div class="result">
			<h2>barcode: <span>192849</span></h2>
			<h2>document name: <span>sample document name</span></h2>
			<h2>document type: <span>communication letters</span></h2>
		</div>

		<div class="result-div">
			<table class="user-list">
				<tr class="user-header">
					<th>Action Done</th>
					<th>Date and Time</th>
					<th>Remarks</th>
					<th>Process Time</th>
				</tr>
				<tr class="user-data">
					<td>maryelisse</td>
					<td>mary elisse gonzales</td>
					<td>maryelisse@gmail.com</td>
					<td>maryelisse@gmail.com</td>
				</tr>
			</table>
		</div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
