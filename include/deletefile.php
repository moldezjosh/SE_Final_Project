<?php
	include('config.php');
	session_start();

	$file_id =$_GET['file_id'];
	$from = $_GET['from'];
	$docu_id = $_GET['docu'];
	$path = "../uploads/".$_GET['file'];

	$delete_qry = "delete from file where file_id='$file_id'";
	mysqli_query($link,$delete_qry);
	$count = mysqli_affected_rows($link);


	if($count>0){
		unlink($path);

		if($from==1 || $from==2 || $from==3){
		?>
		<script>
					alert('Successfully deleted');
					window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';

			</script>
			<?php
		}else{
			?>
				<script>
						alert('Successfully deleted');
						window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
				</script>
	<?php
		}
	}else{
		if($from==1 || $from==2 || $from==3){
		?>
			<script>
					alert('Error! Failed to deadline the file');
					window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
			</script>
<?php
		}else{
			?>
				<script>
						alert('Error! Failed to deadline the file');
						window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
				</script>
	<?php
		}
	}



?>
