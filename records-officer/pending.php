<?php

header('Content-Type: application/json');
// Include config file
require_once '../include/config.php';

    $data_points = array();

    $result = mysqli_query($link, "SELECT location, count(transaction.docu_id) as count from transaction left JOIN document
              ON (transaction.docu_id=document.docu_id) WHERE NOT document.status=4 AND NOT transaction.location='RO'
              GROUP by location");

    while($row = mysqli_fetch_array($result))
    {
        $point = array("label" => $row['location'] , "y" => $row['count']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
