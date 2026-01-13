<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Chat Room</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        background: #f0f2f5;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
        width: 300px;
        background: #fff;
        border-right: 1px solid #ddd;
        padding: 20px;
        overflow-y: auto;
    }

    .sidebar h3 {
        margin-bottom: 15px;
    }

    .user {
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        margin-bottom: 10px;
        background: #f8f8f8;
        transition: 0.3s;
    }

    .user:hover {
        background: #e8e8e8;
    }

    /* ===== CHAT AREA ===== */
    .chat-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #e5ddd5;
    }

    .chat-header {
        background: #075e54;
        padding: 16px;
        color: #fff;
        font-size: 18px;
    }

    .messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .msg {
        max-width: 60%;
        padding: 12px;
        border-radius: 10px;
        font-size: 14px;
    }

    .me {
        align-self: flex-end;
        background: #dcf8c6;
    }

    .other {
        align-self: flex-start;
        background: #fff;
    }

    /* ===== INPUT BAR ===== */
    .input-bar {
        display: flex;
        padding: 10px;
        background: #fff;
    }

    .input-bar input {
        flex: 1;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-right: 10px;
        font-size: 14px;
    }

    .input-bar button {
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        background: #075e54;
        color: white;
        cursor: pointer;
        font-size: 14px;
    }

    /* ===== RESPONSIVE ===== */

    @media (max-width: 768px) {
        .sidebar {
            position: absolute;
            left: -100%;
            width: 250px;
            height: 100%;
            z-index: 10;
            transition: .3s;
        }

        .sidebar.show {
            left: 0;
        }

        .toggle-menu {
            display: block;
            background: #075e54;
            color: white;
            padding: 12px;
            cursor: pointer;
        }
    }

    @media (min-width: 768px) {
        .toggle-menu {
            display: none;
        }
    }
</style>

</head>
<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar" id="sidebar">
    <h3>Daftar Pengguna</h3>

    <?php include "db.php"; 
    $users = $conn->query("SELECT * FROM users ORDER BY username ASC");
    while ($u = $users->fetch_assoc()) { ?>
        <div class="user"><?= $u['username']; ?></div>
    <?php } ?>
</div>

<!-- ===== CHAT AREA ===== -->
<div class="chat-container">
    <div class="toggle-menu" onclick="toggleSidebar()">☰ Menu</div>

    <div class="chat-header">
        Chat Group
    </div>

    <div class="messages" id="messages"></div>

    <div class="input-bar">
        <input type="text" id="msg_input" placeholder="Ketik pesan...">
        <button onclick="sendMessage()">Kirim</button>
    </div>
</div>

<script>
// ========== SHOW/HIDE SIDEBAR MOBILE ==========
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("show");
}

// ========== LOAD CHAT REALTIME ==========
function loadMessages() {
    fetch("load_chat.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("messages").innerHTML = data;
            document.getElementById("messages").scrollTop = 999999;
        });
}

setInterval(loadMessages, 1000);

// ========== SEND MESSAGE ==========
function sendMessage() {
    let msg = document.getElementById("msg_input").value;

    if (msg.trim() === "") return;

    fetch("send.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "message=" + encodeURIComponent(msg)
    });

    document.getElementById("msg_input").value = "";
}
</script>

</body>
</html>
