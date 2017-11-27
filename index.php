<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
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

    <div>
      <h2 class="dash-title">document types transacted per category</h2>
    </div>
    <div>
      <h2 class="dash-title">total number of transactions per office</h2>
    </div>
    <div>
      <h2 class="dash-title">pending per office</h2>
    </div>


  </div>
  <footer class="footer">
			<center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
	</footer>
</body>
</html>
