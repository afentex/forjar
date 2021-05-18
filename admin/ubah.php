<?php
session_start();

if(!isset($_SESSION["namaAdmin"])) {
    header("Location: login.php");
    exit;
}

require "../functions.php";

// Ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$akun = query("SELECT * FROM akun WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('akun BERHASIL diubah!');
                document.location.href='index.php';
            </script>
        ";
    } else{
        echo "Akun gagal diubah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah akun user</title>
</head>
<body>
<h1>Ubah akun user</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $akun["id"]; ?>">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required value="<?= $akun["username"]; ?>">
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="text" name="password" id="password" required>
        </li>
        <li>
            <button type="submit" name="submit">Ubah Akun!</button>
        </li>
    </ul>
</form>
<?php echo $_POST["id"]; echo $_POST["username"]; echo $_POST["password"]; ?>
</body>
</html>