<?php
$conn = new mysqli("localhost", "root", "password_baru", "chatapp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
