<?php

require('../../conn.php');
session_start();

$status = $_POST['status'];
$id = $_POST['id'];

$sql = "UPDATE `room` SET `status`=? WHERE `room_id`=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $status, $id);
$result = $stmt->execute();

$response = array();
if($result){
    $response['success'] = true;
}else{
    $response['success'] = false;
}

echo json_encode($response);

?>
