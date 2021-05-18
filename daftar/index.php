<?php
session_start();
require '../functions.php';

if(isset($_SESSION["nama"])) {
    header("Location: ../");
    exit;
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
    <title>ForJar | Daftar</title>
</head>
<body>
    <!-- <section class="side">
        <img src="../img/img.svg" alt="">
    </section> -->

    <section class="main">
        <div class="login-container">
            <p class="title">Daftar</p>
            <div class="separator"></div>
            <p class="welcome-message">Silahkan masukkan nama dan password anda</p>

            <form action="" method="post" class="login-form">
                <div class="form-control">
                    <input type="text" name="username" placeholder="Username" id="username" autocomplete="off" required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password" id="password1" autocomplete="off" required>
                    <i class="fas fa-lock"></i>
                    <span class="eye1">
                        <i class="fa fa-eye" aria-hidden="true" id="eye1" onclick="toggle1()"></i>
                    </span>
                </div>
                <div class="form-control">
                    <input type="password" name="password2" placeholder="Konfirmasi Password" id="password2" autocomplete="off" required>
                    <i class="fas fa-lock"></i>
                    <span class="eye2">
                        <i class="fa fa-eye" aria-hidden="true" id="eye2" onclick="toggle2()"></i>
                    </span>
                </div>
                <div class="pesan-error">
                    <p class="error">
                    <?php
                        if(isset($_POST["daftar"])){
                            if(daftar($_POST) > 0){
                                $_SESSION["nama"] = $_POST["username"];
                                header("Location: ../");
                                exit;
                            } else{
                                $error = mysqli_error($connect);
                            }
                        }
                ?>
                </p>
                </div>
                <!-- <div class="pesan-error">
                
                    <p class="error" id="error"></p>
                
                </div> -->
                <button type="submit" name="daftar" class="submit">Daftar</button>
                <div class="buat-akun">
                    <p>Sudah punya akun? <a href="../login">Login</a></p>
                </div>
            </form>
        </div>
        
    </section>

<script>
    var state = false;
    function toggle1(){
        if(state){
            document.getElementById("password1").setAttribute("type", "password");
            document.getElementById("eye1").style.color = "#7a797e";
            state = false;
        } else {
            document.getElementById("password1").setAttribute("type", "text");
            document.getElementById("eye1").style.color = "#5887ef";
            state = true;
        }
    }
    function toggle2(){
        if(state){
            document.getElementById("password2").setAttribute("type", "password");
            document.getElementById("eye2").style.color = "#7a797e";
            state = false;
        } else {
            document.getElementById("password2").setAttribute("type", "text");
            document.getElementById("eye2").style.color = "#5887ef";
            state = true;
        }
    }
</script>
</body>
</html>