<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register</title>

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
    }

    /* KIRI REGISTER */
    .left {
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

    .left h1 {
        font-size: 32px;
        font-weight: bold;
    }

    .left p {
        width: 80%;
        font-size: 15px;
    }

    .btn-login2 {
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

    .btn-login2:hover {
        background: #fff;
        color: #00c853;
    }

    /* KANAN FORM */
    .right {
        width: 50%;
        padding: 50px;
    }

    .right h2 {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .input-box {
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

    .btn-register {
        width: 160px;
        padding: 12px;
        background: #00c49a;
        color: #fff;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-register:hover {
        background: #009c79;
    }

    /* RESPONSIVE */
    @media (max-width: 900px) {
        .container {
            flex-direction: column-reverse;
            width: 90%;
            height: auto;
        }

        .left, .right {
            width: 100%;
            padding: 30px;
            text-align: center;
        }

        .left h1, .right h2 {
            font-size: 26px;
        }
    }

    @media (max-width: 520px) {
        .left h1, .right h2 {
            font-size: 22px;
        }

        .container {
            margin: 10px;
        }

        .btn-register, .btn-login2 {
            width: 100%;
        }
    }
</style>
</head>

<body>

<div class="container">

    <div class="left">
        <h1>Selamat Datang!</h1>
        <p>Buat akun baru dan mulai berkomunikasi sekarang</p>
        <button class="btn-login2" onclick="window.location='login.php'">SIGN IN</button>
    </div>

    <div class="right">
        <h2>Create Account</h2>

        <form action="register_process.php" method="POST">
            <div class="input-box"><input type="text" name="name" placeholder="Nama Lengkap" required></div>
            <div class="input-box"><input type="text" name="username" placeholder="Username" required></div>
            <div class="input-box"><input type="password" name="password" placeholder="Password" required></div>
            <button class="btn-register" type="submit">SIGN UP</button>
        </form>
    </div>

</div>

</body>
</html>
