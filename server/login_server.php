<?php
require('conn.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE u_email = ? AND u_password = ? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $email, $password);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user_name'] = $row['u_titleName'].$row['u_Fname'].' '.$row['u_Lname'];
    $_SESSION['user_ID'] = $row['u_id'];
    $_SESSION['user_role'] = $row['u_role'];
    header('location: ../index.php');
}

?>