<?php
	// Include config file
	include('config.php');
	// get the user id from the url
	$id=$_GET['id'];
	// a query that will the user with the specified id
	mysqli_query($link,"delete from users where id='$id'");
	// after deletion, redirect to manage user page
	header('location: ../manageuser.php');
?>
