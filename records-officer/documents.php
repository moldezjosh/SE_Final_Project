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
          <a href="usersetting-record.php">Settings</a>
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
						<?php
							// Include config file
						require_once '../include/config.php';

							$sql = "SELECT count(docu_id) as numOfDocu from document";
							if($stmt = mysqli_prepare($link, $sql)){
					      // Attempt to execute the prepared statement
					      if(mysqli_stmt_execute($stmt)){
					          $result = mysqli_stmt_get_result($stmt);
					            if(mysqli_num_rows($result) == 1){
					                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					                $numOfDocu = $row['numOfDocu'];
					            }
					      }
					    }
					    // Close statement
					    mysqli_stmt_close($stmt);
							?>
            <h3 class="nav-header">all documents<span class="badge badge-light"><?php echo $numOfDocu; ?></span></h3>
              <div class="menu-display" style="height: 350px">

								<table class="user-list" style="width: 100%">
									<tr class="user-header">
										<th>Code</th>
										<th>Type</th>
										<th>Sender</th>
										<th>Recipient</th>
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									<?php

									// Attempt select query execution
									$sql = "SELECT * FROM document ORDER BY docu_id DESC";
									if($result = mysqli_query($link, $sql)){
											if(mysqli_num_rows($result) > 0) {
													while($row = mysqli_fetch_array($result)){
																	echo "<tr class='user-data'>";
																	echo "<td>" . $row['docu_code'] . "</td>";
																	echo "<td>" . $row['docu_type'] . "</td>";
																	echo "<td>". $row['sender_name'] . "</td>";
																	echo "<td>". $row['recipient'] ."</td>";
																	echo "<td>". $row['dateAdded'] ."</td>";
																	if($row['status']==4){
																		echo "<td>Ended</td>";
																	}else{
																		echo "<td>Processing</td>";
																	}

																	echo "<td class='action-icons'>
																			<a href='viewdocu.php?docu_id=". $row['docu_id'] ."&from=4'><img src='../img/view-icon.png' title='View'></a>";
																			?>
																			<a href="#deldocu<?php echo $row['docu_id']; ?>" data-toggle="modal"><img src="../img/delete-ico.png" class="btn btn-info btn-lg" title="Delete"></a>
																			<?php
																			include('deletedocument.php');
																			echo "</td>";
																echo "</tr>";
															}
														mysqli_free_result($result);
													} else {
														?>
															<tr>
																<td colspan="7">No Document(s) Found</td>
															</tr>

															<?php
														}
										} else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
											}
												// Close connection
												mysqli_close($link);
										?>
								</table>

              </div>
            </td>
          </tr>
					<td class="admin-menu" valign="top">
						<div class="user-menus">
						<h3 class="nav-header">menu</h3>
						<ul>
							<li><a href="adddocument.php"><img src="../img/dashboard-icon.png" alt="dashboard-icon"><p>add document</p></a></li>
							<li><a href="documents.php"><img src="../img/create-user-icon.png" alt="crate-user-icon"><p>documents</p></a></li>
							<li><a href="reports.php"><img src="../img/user-setting-icon.png" alt="user-setting-icon"><p>reports</p></a></li>
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
