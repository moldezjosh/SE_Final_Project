<?php
	// Include config file
	include('config.php');
	// Initialize the session
	session_start();

	// get the values from the url
	$file_id =$_GET['file_id'];
	$from = $_GET['from'];
	$docu_id = $_GET['docu'];
	$path = "../uploads/".$_GET['file'];

	// prepare the query
	$delete_qry = "delete from file where file_id='$file_id'";
	// a query that will delete the attached file in the system with the specified file id
	mysqli_query($link,$delete_qry);
	// get the number of affected rows after deletion
	$count = mysqli_affected_rows($link);

	// checking the user type
	if($count>0){
		// unlink/delete the file in the server
		unlink($path);
		/* show success message for the user or records officer
		and redirect to landing page */
		if($from==1 || $from==2 || $from==3){
		?>
		<script>
		// success message for the user
					alert('Successfully deleted');
					window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';

			</script>
			<?php
		}else{
			// success message for the records officer
			?>
				<script>
			// success message, redirect to previous page
						alert('Successfully deleted');
						window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
				</script>
	<?php
		}
	}else{
		// failed message for the user
		if($from==1 || $from==2 || $from==3){
		?>
			<script>
			// error message, redirect to previous page
					alert('Error! Failed to deadline the file');
					window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
			</script>
<?php
		}else{
			// failed message for the records officer
			?>
				<script>
				// error message, redirect to previous page
						alert('Error! Failed to deadline the file');
						window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
				</script>
	<?php
		}
	}
?>
