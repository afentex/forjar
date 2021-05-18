<?php
session_start();

if(!isset($_SESSION["namaAdmin"])) {
    header("Location: login.php");
    exit;
}

require "../functions.php";
// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    // cek apakah data berhasil ditambahkan atau tidak
    if(daftar($_POST) > 0){
        echo "
            <script>
                alert('Akun BERHASIL ditambahkan!');
                document.location.href='index.php';
            </script>
        ";
    } else{
        echo "Akun gagal ditambahkan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah akun user</title>
</head>
<body>
<h1>Tambah akun user</h1>

<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="text" name="password" id="password" required>
        </li>
        <li>
            <label for="password2">Konfirmasi Password :</label>
            <input type="text" name="password2" id="password" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah Akun!</button>
        </li>
    </ul>
</form>

</body>
</html>