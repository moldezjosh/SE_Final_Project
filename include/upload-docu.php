<?php

// Include config file
require_once 'config.php';

// Check if a file has been uploaded
if(isset($_FILES['files'])) {
    // Make sure the file was sent without errors
    if($_FILES['files']['error'] == 0) {

        $from = trim($_GET['from']);
      

        $docu_id = trim($_GET['docu_id']);
        $file = rand(1000,100000)."-".$_FILES['files']['name'];
        $filename = $_FILES['files']['name'];
        $file_loc = $_FILES['files']['tmp_name'];
         $filetype = $_FILES['files']['type'];
         $filesize = $_FILES['files']['size'];
         $folder="../uploads/";

         if(!empty($filename) && !empty($filetype)){

           if(move_uploaded_file($file_loc,$folder.$file)){
             //creates a query
             $sql = "INSERT INTO file (docu_id, file, filename, filetype, filesize ) VALUES ('$docu_id','$file','$filename','$filetype','$filesize')";

             mysqli_query($link,$sql);
            $count = mysqli_affected_rows($link);

             if($count>0){

                 if($from==1 || $from==2 || $from==3){
                 ?>
                   <script>
                       alert('Successfully uploaded');
                       window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
                   </script>
             <?php
                 }else{
                   ?>
                     <script>
                         alert('Successfully uploaded');
                         window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
                     </script>
               <?php
                 }
               } else{
                 if($from==1 || $from==2 || $from==3){
                 ?>
                   <script>
                       alert('Error! Failed to upload the file');
                       window.location.href='../user/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
                   </script>
             <?php
                 }else{
                   ?>
                     <script>
                         alert('Error! Failed to upload the file');
                         window.location.href='../records-officer/viewdocu.php?docu_id=<?php echo $docu_id; ?>&from=<?php echo $from; ?>';
                     </script>
               <?php
                 }

           }

           }
         }else{
             echo "An error accured while the file was being uploaded. ";
         }

    }
    else {
        echo "An error accured while the file was being uploaded. "
           . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }

    // Close the mysql connection
    mysqli_close($link);
}
else {
    echo 'Error! A file was not sent!';
}
?>
