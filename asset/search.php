<?php

include '../connection.php';

// variabel search
$search = $_POST['search'];

$sql = "SELECT * FROM asset
        WHERE
        name LIKE '%$search%' 
        OR
        type LIKE '%$search%'
        ";

$result = $connect->query($sql);

if ($result->num_rows) {
    $data = array();
    while ($get_rows = $result->fetch_assoc()) {
        $data[] = $get_rows; // Masukin ke data
    }

    echo json_encode(array(
        "success" => true,
        "data" => $data,
    ));
} else {
    echo json_encode(array(
        "success" => false,

    ));
}
