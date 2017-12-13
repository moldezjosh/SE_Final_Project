<?php

header('Content-Type: application/json');
// Include config file
require_once '../include/config.php';

    $data_points = array();

    $result = mysqli_query($link, "SELECT location, count(docu_id) as count from transaction WHERE NOT location='RO' GROUP BY location");

    while($row = mysqli_fetch_array($result))
    {
        $point = array("label" => $row['location'] , "y" => $row['count']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
