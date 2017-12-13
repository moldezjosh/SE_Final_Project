<?php
	// Include config file
	include('config.php');
	//get the document id from the url
	$docu_id=$_GET['docu_id'];
	// a query that will delete the document with the specified document id
	mysqli_query($link,"delete from document where docu_id='$docu_id'");
	// a query that will delete the transactions with the specified document id
	mysqli_query($link,"delete from transaction where docu_id='$docu_id'");
	// a query that will delete the recipients with the specified document id
	mysqli_query($link,"delete from recipient where docu_id='$docu_id'");
	//redirect to documents page
	header('location: ../records-officer/documents.php');
?>
