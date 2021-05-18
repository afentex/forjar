<?php
session_start();

if(!isset($_SESSION["nama"])){
    header("Location: login");
}
if(isset($_POST["logout"])){
    header("Location: logout.php");
}

require "functions.php";
$konten = query("SELECT * FROM forum ORDER BY id DESC");

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["kirim"])){
    kirim($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
            var otomatis = setInterval(
                function(){
                    $('#show').load('konten.php').fadeIn('slow');
                }, 1000);
    </script>
    <title>ForJar | Forum-Belajar</title>
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">ForJar | Forum Belajar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a id="warna-putih" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $_SESSION["nama"]; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Ubah Password</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="warna-putih" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hubungi Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="https://api.whatsapp.com/send?phone=62895384288110&text=Hello Admin" target="_blank">Whatsapp</a></li>
                        <li><a class="dropdown-item" href="https://instagram.com/afen_tex" target="_blank">Instagram</a></li>
                        <li><a class="dropdown-item" href="https://facebook.com/afen.tex" target="_blank">Facebook</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://api.whatsapp.com/send?phone=62895384288110&text=Hello Admin Website anda sedang bermasalah" target="_blank">Laporkan Masalah</a>
                </li>
            </ul>
            <div class="d-flex">
                <form action="" method="post" class="">
                    <button type="submit" name="logout" class="btn btn-outline-light">LogOut</button>
                </form>
            </div>
        </div>
    </div>
</nav>
    <!-- Input form -->
<div class="input-form mb-3">
    <form action="" method="post">
        <textarea class="form-control" name="konten" id="exampleFormControlTextarea1" rows="2" required></textarea>
        <button type="submit" name="kirim" class="btn btn-primary">kirim</button>
    </form>
</div>
    <!-- Content -->
<div id="show">
    <?php foreach($konten as $postingan) : ?>
    <div class="konten">
        <div class="info-user">
            <p><?= $postingan["nama"]; ?>,</p><p class="waktu"><?= $postingan["waktu"]; ?></p>
        </div>
        <div class="isi-konten">
            <p><?= $postingan["isi"]; ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>
</html>