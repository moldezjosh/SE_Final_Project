<?php
// Initialize the session
session_start();
    // Include config file
    require_once '../include/config.php';

    $docu_id = $location = $person_ic = $route = $recipient = $remarks = $duration = $reci_id = "";

    $docu_id =  trim($_GET["docu_id"]);
    $from = trim($_GET["from"]);

    $user_session = $_SESSION['username'];
    $sql = "SELECT id, name, office FROM users WHERE username='$user_session'";

    function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

    if($stmt = mysqli_prepare($link, $sql)){
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $person_ic = $row['name'];
                $location = initials($row['office']);
                $id = $row['id'];
            }
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);


    $tmp = explode(" - ", trim($_POST["recipient"]));
    $route = $tmp[1];

    $recipient = trim($_POST["recipient"]);

    $sql = "SELECT id FROM users WHERE name='$tmp[0]'";
    if($stmt = mysqli_prepare($link, $sql)){
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $reci_id = $row['id'];
            }
      }
    }
    // Close statement
    mysqli_stmt_close($stmt);

    $remarks = trim($_POST["remarks"]);

    $duration = "N/A";


      $sql = "INSERT INTO transaction (docu_id, location, person_ic, route, remarks, duration) VALUES (?, ?, ?, ?, ?, ?)";

      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "ssssss", $param_docu_id, $param_location, $param_person_ic, $param_route, $param_remarks, $param_duration);

          // Set parameters
          $param_docu_id = $docu_id;
          $param_location = $location;
          $param_person_ic = $person_ic;
          $param_route = $route;
          $param_remarks = $remarks;
          $param_duration = $duration;


          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            mysqli_query($link,"UPDATE recipient SET status=3 WHERE reci_id=$id AND docu_id=$docu_id");
            mysqli_query($link,"INSERT INTO recipient (docu_id, reci_id, status) VALUES ('$docu_id', '$reci_id', 2)");

              // Redirect to documents page
              header("location: viewdocu.php?docu_id=$docu_id&from=$from");
          } else{
              echo "Something went wrong. Please try again later.";
          }
      }



              // Close statement
              mysqli_stmt_close($stmt);

              // Close connection
              mysqli_close($link);


?>
