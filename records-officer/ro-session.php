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
  // if the usertype session is not records officer, redirect to previous page
	if(strcmp($_SESSION['userType'],'Records Officer')!=0){
	  goback();
	}
?>
