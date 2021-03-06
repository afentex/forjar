<?php
session_start();

if(isset($_SESSION["nama"])) {
    header("Location: ../");
    exit;
}

require '../functions.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) === 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // set session
            $_SESSION["nama"] = $username;
            header("Location: ../");
            exit;
        }
    }

$error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>ForJar | Login</title>
</head>
<body>
    <section class="side">
        <img src="../img/icon.svg" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Selamat Datang</p>
            <div class="separator"></div>
            <p class="welcome-message">Silahkan melakukan login terlebih dahulu</p>

            <form action="" method="post" class="login-form">
                <div class="form-control">
                    <input type="text" name="username" placeholder="Username" id="username" autocomplete="off">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password" id="password" autocomplete="off">
                    <i class="fas fa-lock"></i>
                    <span class="eye">
                        <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
                    </span>
                </div>
                <?php if(isset($error)) : ?>
                    <p class="error">Username / Password anda salah!</p>
                <?php endif; ?>
                <button type="submit" class="submit" name="login">Login</button>
                <div class="buat-akun">
                    <p>Belum punya akun? <a href="../daftar">Buat Akun</a></p>
                </div>
            </form>
        </div>
    </section>
<script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = "#7a797e";
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = "#5887ef";
            state = true;
        }
    }
</script>
</body>
</html>