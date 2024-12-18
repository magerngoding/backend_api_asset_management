<?php

include '../connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user
        WHERE
        username = '$username' AND password = '$password'
        ";

$result = $connect->query($sql);


// num_rows cek datanya ada apa tidak
if ($result->num_rows > 0) {
    $data = array();
    while ($get_row = $result->fetch_assoc()) { // Ambil setiap baris
        $data[] = $get_row;
    }

    echo json_encode(array(
        "success" => true,
        "data" => $data[0], // data pertama
    )); // ubah data di atas ke array
} else {
    echo json_encode(array(
        "success" => false,
    ));
}
