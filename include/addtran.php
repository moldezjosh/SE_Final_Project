<?php
// Initialize the session
session_start();
// Include config file
require_once 'config.php';

  $docu_id = $dateAdded = $location = $person_ic = $route = $remarks = $duration = "";



  $sql = "SELECT docu_id, dateAdded FROM document ORDER BY docu_id DESC LIMIT 1";

    if($stmt = mysqli_prepare($link, $sql)){
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $docu_id = $row['docu_id'];
                $dateAdded = $row['dateAdded'];
            }
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);


  $user_session = $_SESSION['username'];
  $sql = "SELECT name, office FROM users WHERE username='$user_session'";

  if($stmt = mysqli_prepare($link, $sql)){
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

          if(mysqli_num_rows($result) == 1){
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              $person_ic = $row['name'];
              $location = initials($row['office']);
          }
    }
  }
  // Close statement
  mysqli_stmt_close($stmt);


  if(empty($route)){
    $route = "N/A";
  }

  if(empty($remarks)){
    $remarks = "N/A";
  }

  if(empty($duration)){
    $duration = "N/A";
  }

  $sql = "INSERT INTO transaction (docu_id, dateAdded, location, person_ic, route, remarks, duration) VALUES (?, ?, ?, ?, ?, ?, ?)";

  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssssss", $param_docu_id, $param_dateAdded, $param_location, $param_person_ic, $param_route, $param_remarks, $param_duration);

      // Set parameters
      $param_docu_id = $docu_id;
      $param_dateAdded = $dateAdded;
      $param_location = $location;
      $param_person_ic = $person_ic;
      $param_route = $route;
      $param_remarks = $remarks;
      $param_duration = $duration;


      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Redirect to documents page
          header("location: documents.php");
      } else{
          echo "Something went wrong. Please try again later.";
      }
  }
          // Close statement
          mysqli_stmt_close($stmt);

          // Close connection
          mysqli_close($link);

?>
