<?php

include '../connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$old_image = $_POST['old_image'];
$new_image = $_POST['new_image'];
// $new_base64code = $_POST['new_base64code']; // data image

$sql = "UPDATE asset
        SET
        name = '$name',
        type = '$type',
        image = '$new_image'
        WHERE 
        id = '$id'
        ";

$result = $connect->query($sql);

if ($result) {
    if ($old_image != $new_image) {
        // image name if diffrence or if has new image
        unlink("../image/" . $old_image); // hapus image dari penyimapanan
        // file_put_contents("../image/" . $new_image, base64_decode($new_base64code));
    }

    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
