<?php
session_start();
include "db.php";

$chat = $conn->query("SELECT messages.*, users.username 
                      FROM messages 
                      JOIN users ON users.id = messages.user_id 
                      ORDER BY messages.id ASC");

while ($c = $chat->fetch_assoc()) {

    $class = ($c['user_id'] == $_SESSION['user_id']) ? "me" : "other";

    echo "<div class='msg $class'>
        <b>{$c['username']}:</b><br>
        {$c['message']}
    </div>";
}
?>
