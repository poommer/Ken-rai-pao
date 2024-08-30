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

$sql = 'INSERT INTO `user`(`u_id`, `u_titleName`, `u_Fname`, `u_Lname`, `u_dep`, `u_tel`, `u_email`, `u_line`, `u_password`, `u_role`, `u_status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

$stmt = $conn->prepare($sql);

$stmt->bind_param('sssssssssss', $code, $title_name, $Fname, $Lname, $department, $tel, $email, $line, $password, $role, $status );

$role = 'user';
$status = 'active';

$result = $stmt->execute();

if($result){
    $_SESSION['msg_success'] = 'สร้างผู้ใช้ใหม่สำเร็จ';
}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถสร้างผู้ใช้ได้';
}

header('location: ../../../admin/user.php')
?>