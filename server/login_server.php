<?php
require('conn.php');
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE user_Email = ? AND user_password = ? AND user_status = 'active'";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $email, $password);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user_name'] = $row['user_nameTitle'].$row['user_firstName'].' '.$row['user_lastName'];
    $_SESSION['user_ID'] = $row['user_ID'];
    $_SESSION['user_role'] = $row['user_role'];
    header('location: ../index.php');
}

?>