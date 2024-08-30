<?php
require('../../conn.php');
session_start();

$code = $_GET['id'];
$sql = "DELETE FROM `user` WHERE `u_id` = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('s',  $code );


$result = $stmt->execute();

if($result){
    $_SESSION['msg_success'] = 'ลบผู้ใช้ '.$code.' แล้ว';
}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถลบผู้ใช้ '.$code.' ได้';
}

header('location: ../../../admin/user.php')

?>