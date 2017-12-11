
<!-- Delete Document-->
    <div class="modal fade" id="delfile<?php echo $row['file_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($link,"select * from file where file_id='".$row['file_id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Filename: <strong><?php echo $drow['filename']; ?></strong></center></h5>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></span> Cancel</button>
                    <a href="../include/deletefile.php?file_id=<?php echo $row['file_id']; ?>&from=<?php echo $_GET['from']; ?>&docu=<?php echo $row['docu_id']; ?>&file=<?php echo $row['file']; ?>" class="btn btn-danger"></span> Delete</a>
                </div>

            </div>
        </div>
    </div>
<!-- /.modal -->
