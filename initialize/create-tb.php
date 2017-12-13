<?php
  include '../include/config.php';

  createDocuTypes();

function createUsers(){
  $sql = "CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(50) NOT NULL,
        name VARCHAR(50) NOT NULL,
        office VARCHAR(50) NOT NULL,
        userType VARCHAR(30) NOT NULL,
        position VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP
      )";

  if(mysqli_query($link,$sql)){
    ?>
        <script> alert('Table was created successfully'); </script>
    <?php
    exit();
  }else{
    ?>
        <script> alert('Error in creating Users table!'); </script>
    <?php
    exit();
  }

}

function insertAdmin(){
  $password = password_hash('admin12', PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (username, email, name, office, userType, position, password) VALUES ('admin','admin@gmail.com','Admin','Knowledge Management Division','admin','Developer','$password')";

  if(mysqli_query($link,$sql))
      echo "Admin successfully inserted";
  else
      die("Error inserting into the table");
}

function createDocument(){
  $sql = "CREATE TABLE document (
          docu_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_code INT(11) NOT NULL,
          docu_type VARCHAR(50) NOT NULL,
          deadline VARCHAR(50) NOT NULL,
          deli_type VARCHAR(10) NOT NULL,
          sender_name VARCHAR(50) NOT NULL,
          sender_address VARCHAR(50) NOT NULL,
          recipient VARCHAR(50) NOT NULL,
          reci_id INT(11) NOT NULL,
          details VARCHAR(50) NOT NULL,
          status INT(11) NOT NULL,
          dateAdded TIMESTAMP
          )";

    if(mysqli_query($link,$sql))
        echo "Document table was created successfully";
    else
        die("Error creating the table document");
}

function createTransaction(){
  $sql = "CREATE TABLE transaction (
          transact_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_id INT(11) NOT NULL,
          dateAdded TIMESTAMP,
          location VARCHAR(50) NOT NULL,
          person_ic VARCHAR(50) NOT NULL,
          route VARCHAR(10) NOT NULL,
          remarks VARCHAR(50) NOT NULL,
          duration VARCHAR(50) NOT NULL
          )";

  if(mysqli_query($link,$sql))
      echo "Transaction table was created successfully";
  else
      die("Error creating the table transaction");
}

function createRecipient(){
  $sql = "CREATE TABLE recipient (
          reciTable_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_id INT(11) NOT NULL,
          reci_id INT(11) NOT NULL,
          status INT(11) NOT NULL
          )";

  if(mysqli_query($link,$sql))
      echo "Recepient table was created successfully";
  else
      die("Error creating the table recipient");
}

function createFile(){
  $sql = "CREATE TABLE file (
          file_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_id INT(11) NOT NULL,
          file INT(100) NOT NULL,
          filename INT(100) NOT NULL,
          filetype VARCHAR(10) NOT NULL,
          filesize BIGINT(20) NOT NULL,
          created TIMESTAMP
          )";

  if(mysqli_query($link,$sql))
      echo "File table was created successfully";
  else
      die("Error creating the table file");
}

function createDocuTypes(){
  include '../include/config.php';
  
  $sql = "CREATE TABLE docutypes (
          docuType_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_type VARCHAR(50) NOT NULL)";

  if(mysqli_query($link,$sql))
      echo "Document Type table was created successfully";
  else
      die("Error creating the table Document Type");


  $sql = "INSERT INTO docutypes (docu_type)
          VALUES
          ('Request'),
          ('Invitation'),
          ('Request and Invitation'),
          ('For Information'),
          ('Memorandum'),
          ('Purchase Requests'),
          ('Job Order')
          ";

  if(mysqli_query($link,$sql))
      echo "Document types successfully inserted";
  else
      die("Error inserting into the table");
}


    mysqli_close($link);

?>
