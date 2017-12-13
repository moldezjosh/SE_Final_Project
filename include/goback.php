<?php
  // a function that will redirect to previous page
  function goback()
  {
      header("location:javascript://history.go(-1)");
      exit;
  }

?>
