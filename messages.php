<?php
include "db.php";

$result = $conn->query("
    SELECT messages.*, users.username 
    FROM messages 
    JOIN users ON users.id = messages.user_id
    ORDER BY messages.id ASC
");

while ($row = $result->fetch_assoc()) {
    echo "<div class='msg'><span class='user'>{$row['username']}:</span> {$row['message']}</div>";
}
?>
