<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

// Create connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE webdts";
if (mysqli_query($link,$sql) === TRUE) {
  header('location: create-tb.php');
  exit();
} 

mysqli_close($link);
?>
