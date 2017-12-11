<?php
	include('config.php');
	$id=$_GET['id'];
	mysqli_query($link,"delete from users where id='$id'");
	header('location: ../manageuser.php');

?>
