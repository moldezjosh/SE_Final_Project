<?php
  include 'config.php';

  // creates users table
  $sql = "CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        name VARCHAR(50) NOT NULL,
        office VARCHAR(50) NOT NULL,
        userType VARCHAR(30) NOT NULL,
        position VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP
      )";

  mysqli_query($link,$sql);

  //insert admin user to users table
  $password = password_hash('admin12', PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (username, email, name, office, userType, position, password) VALUES ('admin','admin@gmail.com','Admin','Knowledge Management Division','admin','Developer','$password')";

  mysqli_query($link,$sql);

  // creates document table
  $sql = "CREATE TABLE document (
          docu_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          docu_code VARCHAR(50) NOT NULL,
          docu_type VARCHAR(50) NOT NULL,
          deadline VARCHAR(50) NOT NULL,
          deli_type VARCHAR(50) NOT NULL,
          sender_name VARCHAR(50) NOT NULL,
          sender_address VARCHAR(50) NOT NULL,
          recipient VARCHAR(50) NOT NULL,
          reci_id INT(11) NOT NULL,
          details VARCHAR(50) NOT NULL,
          status INT(11) NOT NULL,
          dateAdded TIMESTAMP
          )";

    mysqli_query($link,$sql);

    //creates transaction table
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

    mysqli_query($link,$sql);

    // creates recipient table
    $sql = "CREATE TABLE recipient (
            reciTable_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            docu_id INT(11) NOT NULL,
            reci_id INT(11) NOT NULL,
            status INT(11) NOT NULL
            )";

    mysqli_query($link,$sql);

    // creates file table
    $sql = "CREATE TABLE file (
            file_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            docu_id INT(11) NOT NULL,
            file VARCHAR(100) NOT NULL,
            filename VARCHAR(255) NOT NULL,
            filetype VARCHAR(10) NOT NULL,
            filesize BIGINT(20) NOT NULL,
            created TIMESTAMP
            )";

    header('location: ../login.php');
    exit();

?>
