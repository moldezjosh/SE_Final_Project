<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}
	// Include go back function
	require_once '../include/goback.php';

	if(strcmp($_SESSION['userType'],'User')!=0){
	  goback();
	}
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
					<a href="processingdocu.php">Documents</a>
          <a href="usersetting-user.php">Settings</a>
          <a href="../include/logout.php">Logout</a>
        </div>
      </div>
    </div>

    <div class="contents">
			<div class="view-docu">

        <?php

        // Include config file
      require_once '../include/config.php';
          $docu_id =  trim($_GET["docu_id"]);
          $from = trim($_GET["from"]);

          $sql = "SELECT docu_code, status FROM document WHERE docu_id=$docu_id";
          if($stmt = mysqli_prepare($link, $sql)){
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                  if(mysqli_num_rows($result) == 1){
                      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      $status = $row['status'];
                      $docu_code = $row['docu_code'];
                  }
            }
          }
          ?>
          <div>
				<div class="docu-code">
					<h2><?php echo $docu_code;
          echo "<span>";
            if($status==4){
              echo "Ended";
            }else {
              echo "Processing";
            }
          "</span></h2>";

          ?>
				</div>

				<div class="docu-setting">
          <?php

            $user_sess = trim($_SESSION['username']);
            //$sql = "SELECT userType FROM users WHERE username='$user_sess'";
            $sql = "SELECT id, userType, recipient.status FROM users LEFT JOIN recipient ON users.id=recipient.reci_id WHERE users.username='$user_sess' AND recipient.docu_id=$docu_id";
            if($stmt = mysqli_prepare($link, $sql)){
              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt)){
                  $result = mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $userType = $row['userType'];
                        $stats = $row['status'];
                    }
              }
            }

            if (($stats==2) && (strcmp($userType,"User")==0)) {
              echo "<a href='receive-docu.php?docu_id=$docu_id&from=$from'><h2>Receive this document</h2></a>";
            }elseif (($stats==3) && (strcmp($userType,"User")==0)) {
              echo "<a href='#forward' data-toggle='modal'><h2>Forward</h2></a>";
              echo "<a href='#end' data-toggle='modal'><h2>End</h2></a>";
            }
           ?>

					<h2>
            <?php
            if(strcmp($from,'1')==0){
              echo "<a href='incomingdocu.php'>";
            }else if(strcmp($from,'2')==0){
              echo "<a href='processingdocu.php'>";
            }else{
              echo "<a href='processeddocu.php'>";
            }
            ?>Back</a></h2>
				</div>
      </div>

      <?php include('../records-officer/release.php'); ?>

				<table>
					<tr>
						<td>
				<div class="docu-detail">
				  <h3 class="nav-header">document details</h3>
						<div class="det-br">
							<table style="width: 96%">
								<?php
								// Attempt select query execution
								$sql = "SELECT * FROM document WHERE docu_id='$docu_id'";
								if($result = mysqli_query($link, $sql)){
										if(mysqli_num_rows($result) > 0) {
												while($row = mysqli_fetch_array($result)){
													?>
															<tr>
																<th>document type</th>
																	<td><?php echo $row['docu_type']; ?></td>
															</tr>
															<tr>
																<th>delivery method</th>
																	<td><?php echo $row['deli_type']; ?></td>
															</tr>
															<tr>
																<th>details</th>
																	<td>From: <?php echo $row['sender_name']; ?> of <?php echo $row['sender_address']; ?>. <?php echo $row['details']; ?></td>
															</tr>
															<tr>
																<th>recipient</th>
																	<td><?php echo $row['recipient']; ?></td>
															</tr>
															<tr>
																<th>deadline</th>
																	<td><?php echo $row['deadline']; ?></td>
															</tr>
													</table>
													<?php
												}
												mysqli_free_result($result);
										} else {
												//echo "<p class='lead'><em>No document(s) were found.</em></p>";
											}
										} else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
										}

										?>
						</div>
				</div>
			</td>
			<td valign="top">
				<div class="attachment">
          <?php
            if($status!=4){
              echo "<a href='#upload' data-toggle='modal' class='plus-icon' title='Add'>&plus;</a>";
            }
            ?>

					 <h3 class="nav-header">attachments</h3>
					 <div class="at-br">
						 <table>
							 <tr>
								 <th>Filename</th>
								 <th>Action</th>
							 </tr>
               <?php
                    $sql="SELECT * FROM file WHERE docu_id='$docu_id'";
                    $result=mysqli_query($link,$sql);
                    if(mysqli_num_rows($result) > 0) {
                        while($row=mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td>". mb_strimwidth($row['filename'], 0, 20, "...") ."</td>";
                          echo "<td class='action-icons'><center>
                          <a href='../uploads/". $row['file'] ."' target='_blank'><img src='../img/view-icon.png' title='View'></a>
                                <a href='#delfile". $row['file_id'] ."' data-toggle='modal'><img src='../img/delete-ico.png' title='Delete'></a><center></td>";
                          echo "</tr>";
                          include('../records-officer/delete-file.php');
                        }
                    }else {
                        echo "<tr>";
                        echo "<td colspan='2'>No File(s) Found</td>";
                        echo "</tr>";
                    } ?>
						 </table>
					 </div>
				 </div>
			</td>
		</tr>
	</table>

			<div class="transact-div">
				 <h3 class="nav-header">transactions</h3>
				 <div class="at-br">
				<table class="transact-table">
					<tr>
						<th>Date and Time</th>
						<th>Location</th>
						<th>Person in Charge</th>
						<th>Route</th>
						<th>Remarks</th>
						<th>Duration</th>
					</tr>
          <?php


          $sql = "SELECT * FROM transaction WHERE docu_id='$docu_id' ORDER BY transact_id DESC";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_array($result)){

                    echo "<tr>";
          					echo "<td>". $row['dateAdded'] ."</td>";
          					echo "<td>". $row['location'] ."</td>";
          					echo "<td>". $row['person_ic'] ."</td>";
          					echo "<td>". $row['route'] ."</td>";
          					echo "<td>". $row['remarks'] ."</td>";
          					echo "<td>". $row['duration'] ."</td>";
          					echo "</tr>";
                    }
              }
            }
            mysqli_free_result($result);
            // Close connection
            mysqli_close($link);
          ?>
				</table>
			</div>
			</div>


</div>
      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
