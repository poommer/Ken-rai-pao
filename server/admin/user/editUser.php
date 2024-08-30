<?php
require('../../conn.php');
session_start();

$title_name = $_POST['Tname'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$code = $_POST['code'];
$department = $_POST['department'];
$tel = $_POST['tel'];
$line = $_POST['line'];
$email = $_POST['email'];
$password = $_POST['password'];
print_r($_POST);

$sql = "UPDATE `user` SET `u_titleName`=?, `u_Fname`= ? ,`u_Lname`= ?, `u_dep`= ?,`u_tel`= ?, `u_email`= ?, `u_line`= ?, `u_password`= ? WHERE `u_id` = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssssssss', $title_name, $Fname, $Lname, $department, $tel, $email, $line, $password, $code );


$result = $stmt->execute();

if($result){
    $_SESSION['msg_success'] = 'แก้ไขผู้ใช้ '.$code.' แล้ว';
}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถแก้ไขผู้ใช้ '.$code.' ได้';
}

header('location: ../../../admin/user.php')
?>