
<!-- Delete Document Modal -->
    <div class="modal fade" id="deldocu<?php echo $row['docu_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$del=mysqli_query($link,"select * from document where docu_id='".$row['docu_id']."'");
					$drow=mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5><center>Document Code: <strong><?php echo $drow['docu_code']; ?></strong></center></h5>
                </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"></span> Cancel</button>
                    <a href="../include/delete-docu.php?docu_id=<?php echo $row['docu_id']; ?>" class="btn btn-danger"></span> Delete</a>
                </div>

            </div>
        </div>
    </div>
<!-- /.modal -->
