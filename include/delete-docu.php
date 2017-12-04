<?php
	include('config.php');
	$docu_id=$_GET['docu_id'];
	mysqli_query($link,"delete from document where docu_id='$docu_id'");
	mysqli_query($link,"delete from transaction where docu_id='$docu_id'");
	mysqli_query($link,"delete from recipient where docu_id='$docu_id'");
	header('location: ../records-officer/documents.php');
?>
