<?php
	// Include records officer session file
	require_once 'ro-session.php';
?>

<!DOCTYPE html>
<head>
	<title>WebDTS</title>
	<link rel="stylesheet" type="text/css" href="../css/styles.css" />
  <script type="text/javascript" src="../js/scripts.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
					<a href="documents.php">Documents</a>
          <a href="usersetting-record.php">Settings</a>
          <a href="../include/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="contents">

			    <div>
			      <h2 class="dash-title">document types transacted per category</h2>
						<div id="chartPerCategory" style="width: 100%; height: 380px;"></div>
			    </div>
			    <div>
			      <h2 class="dash-title">total number of transactions per office</h2>
						<div id="chartPerOffice" style="width: 100%; height: 380px;"></div>
			    </div>
			    <div>
			      <h2 class="dash-title">pending per office</h2>
						<div id="chartPending" style="width: 100%; height: 380px;"></div>
			    </div>

      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>

				<script type="text/javascript">
        $(document).ready(function () {

            $.getJSON("perCategory.php", function (result) {

                var chart = new CanvasJS.Chart("chartPerCategory", {
                    data: [{
														type: "bar",
														dataPoints: result
                        }]
                });
                chart.render();
            });

						$.getJSON("perOffice.php", function (result) {

                var chart2 = new CanvasJS.Chart("chartPerOffice", {
                    data: [{
														type: "bar",
														dataPoints: result
                        }]
                });
                chart2.render();
            });

						$.getJSON("pending.php", function (result) {

                var chart3 = new CanvasJS.Chart("chartPending", {
                    data: [{
														type: "bar",
														dataPoints: result
                        }]
                });
                chart3.render();
            });
        });
    </script>

    </body>
  </html>
