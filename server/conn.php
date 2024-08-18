<?php
try {
$conn = mysqli_connect('localhost', 'root', '', 'mcr_booking');

$conn->set_charset('UTF-8');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
} catch (mysqli_sql_exception $e) {
  die( $e);
}
?>