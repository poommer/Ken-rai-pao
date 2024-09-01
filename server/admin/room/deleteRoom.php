<?php
require('../../conn.php');
session_start();

$code = $_GET['id'];
$sql = "DELETE FROM `room` WHERE `room_id` = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s',  $code );


$result = $stmt->execute();

if($result){
    $_SESSION['msg_success'] = 'ลบห้อง '.$code.' แล้ว';
}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถลบห้อง '.$code.' ได้';
}

header('location: ../../../admin/room.php')

?>