<?php

include '../connection.php';

$sql = "SELECT * FROM asset";
$result = $connect->query($sql);

// Cek ada data apa engga menggunakan num_rows dan ambil semua data
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
