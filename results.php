<?php
    session_start();

    // Include config file
  require_once 'include/config.php';

    // If session variable is not set it will redirect to login page
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
      header("location: login.php");
      exit;
    }

    $code_query ="";
    if(isset($_GET["search_query"]) && !empty($_GET["search_query"])){
      $code_query =  strtoupper(trim($_GET["search_query"]));
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

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <div class="search-div">
            <input type="text" name="search_query" value="<?php echo $code_query ?>" placeholder="Track a Document"/>
            <span><button type="submit" class="btnSearch"><img src="img/search-icon.png"></button></span>
        </div>
      </form>
      <span>
      <div class="dropdown">
        <button onclick="dropFunc()" class="dropbtn"><?php echo $_SESSION['username']; ?></button>
        <div id="myDropdown" class="dropdown-content">
        <?php
            if(strcmp($_SESSION['userType'],"Admin")==0){
              ?>
      					<a href="index.php">My Menus</a>
                <a href="include/logout.php">Logout</a>
              <?php
            }else if(strcmp($_SESSION['userType'],"User")==0){
              ?>
      					<a href="user/processingdocu.php">Documents</a>
                <a href="user/usersetting-user.php">Settings</a>
                <a href="include/logout.php">Logout</a>
              <?php
            }else{
              ?>
                <a href="records-officer/documents.php">Documents</a>
                <a href="records-officer/usersetting-record.php">Settings</a>
                <a href="include/logout.php">Logout</a>
            <?php
            }
        ?>
        </div>
      </div>
      <span>
    </div>

    <div class="contents">

			<div class="view-docu">
        <?php
        if(isset($_GET["search_query"]) && !empty($_GET["search_query"])){
          $code_query =  trim($_GET["search_query"]);

          ?>

        <div>

      <div class="docu-code">
        <h2><?php echo strtoupper($code_query);

          $sql = "SELECT * FROM document WHERE docu_code='$code_query'";

          if($stmt = mysqli_prepare($link, $sql)){
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                  if(mysqli_num_rows($result) == 1){
                      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      $docu_id = $row['docu_id'];
                      $docu_type = $row['docu_type'];
                      $deli_type = $row['deli_type'];
                      $sender_name = $row['sender_name'];
                      $sender_address = $row['sender_address'];
                      $details = $row['details'];
                      $recipient = $row['recipient'];
                      $deadline = $row['deadline'];
                      $status = $row['status'];

                      echo "<span>";
                        if($status==4){
                          echo "Ended";
                        }else {
                          echo "Processing";
                        }
                       echo "</span></h2>";

                      ?>
                    </div>


                  </div>
                    <table>
                      <tr>
                        <td>
                    <div class="docu-detail">
                      <h3 class="nav-header">document details</h3>
                        <div class="det-br">
                          <table style="width: 96%">
                                          <tr>
                                            <th>document type</th>
                                              <td><?php echo $docu_type; ?></td>
                                          </tr>
                                          <tr>
                                            <th>delivery method</th>
                                              <td><?php echo $deli_type; ?></td>
                                          </tr>
                                          <tr>
                                            <th>details</th>
                                              <td>From: <?php echo $sender_name; ?> of <?php echo $sender_address; ?>. <?php echo $details; ?></td>
                                          </tr>
                                          <tr>
                                            <th>recipient</th>
                                              <td><?php echo $recipient; ?></td>
                                          </tr>
                                          <tr>
                                            <th>deadline</th>
                                              <td><?php echo $deadline; ?></td>
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
                           <?php

                             $sql="SELECT * FROM file WHERE docu_id='$docu_id'";
                             $result_set=mysqli_query($link,$sql);
                             if(mysqli_num_rows($result_set) > 0) {
                                 while($row=mysqli_fetch_array($result_set)){
                                  ?>
                                 <tr>
                                   <td><?php echo $row['file'] ?>.<?php echo $row['type'] ?></td>
                                   <td class="action-icons"><center>
                                       <a href="#"><img src="img/view-icon.png" title="View"></a>
                                      <a href="uploads/<?php echo $row['file'] ?>" target="_blank"><img src="img/delete-ico.png" title="Delete"></a><center>
                                       </td>
                                 </tr>
                            <?php
                                }
                            } ?>
                           <tr>
                             <td colspan="2">No File(s) Found</td>
                           </tr>
                           <?php
                           ?>
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

                <?php
                  }else{
                    echo "</h2>";
                    echo "<br><p>No document transaction(s) found</p>";
                  }
            }
          }
      }  else{
          echo "<br><p>No document transaction(s) found</p>";
        }
          ?>

</div>

</div>
      </div>

    </div>
        <footer class="footer">
            <center><p class="copyright">COPYRIGHT © 2017. MINDANAO DEVELOPMENT AUTHORITY, REPUBLIC OF THE PHILIPPINES. ALL RIGHTS RESERVED.</p></center>
        </footer>
    </body>
  </html>
