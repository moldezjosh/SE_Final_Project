<?php
    // Initialize the session
    session_start();

    // Include config file
    require_once 'config.php';

    $docu_id = trim($_GET['docu_id']);


  	header('location: index.php');

?>
