<!-- Release -->
    <div class="modal fade" id="release" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Action</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="include/release-docu.php?docu_id=<?php echo $_GET['docu_id']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Route to/CC:</label>
						</div>
						<div class="col-lg-10">
              <input list="recipient" name="recipient" class="form-control" placeholder="Enter Name">
              <datalist id="recipient" >

        <?php
                // Include config file
              require_once 'include/config.php';

              function initials($str) {
                  $ret = '';
                  foreach (explode(' ', $str) as $word)
                      $ret .= strtoupper($word[0]);
                  return $ret;
              }

                // Attempt select query execution
                $sql = "SELECT name, office, userType FROM users WHERE userType='User' ORDER BY name ASC";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)){
                            echo "<option>". $row['name'] . " - ". initials($row['office']) ."</option>";
                      }
                      // Free result set
                      mysqli_free_result($result);
                    }
                  }
                ?> </datalist>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Remarks:</label>
						</div>
						<div class="col-lg-10">
              <textarea rows="3" cols="34" class="form-control" name="remarks" placeholder="Remarks"></textarea>
						</div>
					</div>
					<div style="height:10px;"></div>

                </div>
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</a>
				</form>
                </div>

            </div>
        </div>
    </div>
<!-- End of Release -->

<!-- Forward -->
    <div class="modal fade" id="forward" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Forward</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
				<form method="POST" action="include/forward-docu.php?docu_id=<?php echo $_GET['docu_id']; ?>">
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Route to/CC:</label>
						</div>
						<div class="col-lg-10">
              <input list="recipient" name="recipient" class="form-control" placeholder="Enter Name">
              <datalist id="recipient" >

        <?php
                // Include config file
              require_once 'include/config.php';

                // Attempt select query execution
                $sql = "SELECT name, office, userType FROM users WHERE userType='User' ORDER BY name ASC";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_array($result)){
                            echo "<option>". $row['name'] . " - ". initials($row['office']) ."</option>";
                      }
                      // Free result set
                      mysqli_free_result($result);
                    }
                  }
                ?> </datalist>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-2">
							<label class="control-label" style="position:relative; top:7px;">Remarks:</label>
						</div>
						<div class="col-lg-10">
              <textarea rows="3" cols="34" class="form-control" name="remarks" placeholder="Remarks"></textarea>
						</div>
					</div>
					<div style="height:10px;"></div>

                </div>
				</div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</a>
				</form>
                </div>

            </div>
        </div>
    </div>
<!-- End of Release -->
