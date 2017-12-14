<?php
// Include config file
require_once 'config.php';
  // get the values from the url
  $docu_id = trim($_GET['docu_id']);
  // initialize variable i=1
  $i = 1;
  // initialize tmp variable as blank
  $tmp = "";
  // select query
  $sql = "SELECT dateAdded from transaction WHERE docu_id=$docu_id ORDER BY dateAdded DESC LIMIT 2";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
          if($i==1){
            // get the current date
            $tmpcurr = $row['dateAdded'];
            $curr = date_create($tmpcurr);
            $i++;
          }else{
            // get the previous date
            $prev = $row['dateAdded'];
            $prev = date_create($prev);
            // get the difference of two dates
            $upDuration = date_diff($prev,$curr);
            // format the difference
            $tmp = $upDuration->format("%D day/s %H:%I:%S");
            // a query that will update the duration
            mysqli_query($link,"UPDATE transaction SET duration='$tmp' WHERE dateAdded='$tmpcurr'");
          }
        }
      }
    }
    // Close connection
    mysqli_close($link);
 ?>
