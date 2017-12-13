<?php
	
header('Content-Type: application/json');
// Include config file
require_once '../include/config.php';

    $data_points = array();

    $result = mysqli_query($link, "SELECT docu_type, count(docu_type) as count from document GROUP BY docu_type");

    while($row = mysqli_fetch_array($result))
    {
        $point = array("label" => $row['docu_type'] , "y" => $row['count']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
