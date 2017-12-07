
<?php
include_once '../include/config.php';

if(isset($_FILES['files'])){
      $errors= array();
      $file_name = $_FILES['files']['name'];
      $file_size = $_FILES['files']['size'];
      $file_tmp = $_FILES['files']['tmp_name'];
      $file_type = $_FILES['files']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['files']['name'])));

      $expensions= array("pdf");

      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a PDF file.";
      }

      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
         header("location: viewdocu.php?docu_id=$docu_id");
      }else{
         print_r($errors);
      }
   }
?>
