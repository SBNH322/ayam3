<?php
session_start();
include "db.php";

$msg = $_POST['message'];
$uid = $_SESSION['user_id'];

$conn->query("INSERT INTO messages(user_id, message) VALUES('$uid', '$msg')");
?>
