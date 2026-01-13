<?php include "db.php"; session_start(); ?>

<?php
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: chat.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background: #f0f2f5;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 950px;
        height: 520px;
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        box-shadow: 0px 10px 35px rgba(0,0,0,0.15);
        transition: .3s;
    }

    /* PANEL KIRI */
    .left {
        width: 50%;
        padding: 50px;
        box-sizing: border-box;
    }

    .left h2 {
        font-size: 32px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .social-buttons {
        display: flex;
        gap: 15px;
        margin-bottom: 15px;
    }

    .social-buttons div {
        width: 40px;
        height: 40px;
        border: 1px solid #ccc;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        font-size: 18px;
        color: #555;
        transition: 0.3s;
    }

    .social-buttons div:hover {
        background: #eee;
    }

    .or-text {
        font-size: 13px;
        color: #777;
        margin: 10px 0 20px;
        text-align: center;
    }

    .input-box {
        width: 100%;
        margin-bottom: 15px;
    }

    .input-box input {
        width: 100%;
        padding: 13px;
        border-radius: 5px;
        border: none;
        background: #efefef;
        font-size: 14px;
    }

    .forgot {
        margin: 5px 0 20px;
        font-size: 13px;
        color: #555;
        cursor: pointer;
    }

    .forgot:hover {
        text-decoration: underline;
    }

    .btn-login {
        width: 160px;
        padding: 12px;
        background: #00c49a;
        border: none;
        border-radius: 25px;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #009c79;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }

    /* PANEL KANAN */
    .right {
        width: 50%;
        background: linear-gradient(to right, #00c853, #00e676);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
        text-align: center;
    }

    .right h1 {
        margin: 0;
        font-size: 32px;
        font-weight: bold;
    }

    .right p {
        width: 80%;
        margin-top: 15px;
        font-size: 15px;
        line-height: 22px;
    }

    .btn-signup {
        margin-top: 25px;
        padding: 12px 35px;
        border: 2px solid #fff;
        border-radius: 25px;
        background: transparent;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-signup:hover {
        background: #fff;
        color: #00c853;
    }

    /* ========= RESPONSIVE ========== */

    @media (max-width: 900px) {
        .container {
            width: 90%;
            height: auto;
            flex-direction: column;
        }

        .left, .right {
            width: 100%;
            padding: 30px;
        }

        .right {
            border-radius: 0 0 15px 15px;
        }

        .left h2 {
            font-size: 26px;
        }
    }

    @media (max-width: 520px) {
        .left h2, .right h1 {
            font-size: 22px;
        }

        .social-buttons div {
            width: 35px;
            height: 35px;
            font-size: 15px;
        }

        .btn-login, .btn-signup {
            width: 100%;
        }

        .right p {
            width: 95%;
            font-size: 14px;
        }

        .container {
            margin: 10px;
        }
    }
</style>

</head>

<body>

<div class="container">

    <!-- PANEL KIRI -->
    <div class="left">
        <h2>Sign in</h2>

        <div class="social-buttons">
            <div>f</div>
            <div>G+</div>
            <div>in</div>
        </div>

        <div class="or-text">atau gunakan akun anda</div>

        <?php if (!empty($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>

        <form method="POST">

            <div class="input-box">
                <input type="text" name="username" placeholder="Email/Username" required>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="forgot">Lupa kata sandi anda?</div>

            <button class="btn-login" type="submit">SIGN IN</button>
        </form>
    </div>

    <!-- PANEL KANAN -->
    <div class="right">
        <h1>Halo, Teman!</h1>
        <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>

        <button class="btn-signup" onclick="window.location='register.php'">
            SIGN UP
        </button>
    </div>

</div>

</body>
</html>
