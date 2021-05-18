<?php
session_start();

if(!isset($_SESSION["namaAdmin"])) {
    header("Location: login.php");
    exit;
}

require '../functions.php';

$akun = query("SELECT * FROM akun ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForJar | Halaman Admin</title>
</head>
<body>
    <a href="logout.php">LogOut</a>
    <h1>Halaman Admin</h1>
    <a href="tambah.php" class="tambah">Tambah akun user</a>
    <br>
    <p>Daftar akun user</p>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Username</th>
            <th>Password</th>
            <th>Tanggal</th>
        </tr>

        <?php $i=1; ?>
        <?php foreach($akun as $row) : ?>
            <tr>
            <td><?= $i ?></td>
            <td class="aksi">
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">hapus</a>
            </td>
            <td><?= $row["username"]; ?></td>
            <td><?= $row["password"]; ?></td>
            <td><?= $row["tanggal"]; ?></td>
        <?php $i++; ?>
        <?php endforeach; ?>
        </tr>
    </table>
</body>
</html>