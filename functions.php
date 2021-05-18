<?php
date_default_timezone_set('Asia/Jakarta');
$connect = mysqli_connect("localhost", "root", "", "forjar");

function query($query){
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// Function untuk ubah akun
function ubah($data){
    global $connect;

    $id = $data["id"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query insert data
    $query = "UPDATE akun SET
                username = '$username',
                password = '$password'
            WHERE id = $id
            ";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

// Function untuk hapus akun
function hapus($id){
    global $connect;
    mysqli_query($connect, "DELETE FROM akun WhERE id = $id");
    return mysqli_affected_rows($connect);
}

// Function untuk daftar akun
function daftar($data){
    global $connect;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["password2"]);
    $tanggal = date("j/n/Y H:i:s");

    // cek apakah username sudah ada atau belum
    $result = mysqli_query($connect, "SELECT username FROM akun WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "Username sudah terdaftar!";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2){
        echo "Konfirmasi passoword anda tidak sesuai!";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($connect, "INSERT INTO akun VALUES('', '$username', '$password', '$tanggal')");

    return mysqli_affected_rows($connect);
}

function kirim($data){
    global $connect;

    $nama = $_SESSION["nama"];
    $isi = htmlspecialchars($data["konten"]);
    $waktu = date("j/n/Y H:i:s");

    // tambahkan konten ke database
    mysqli_query($connect, "INSERT INTO forum VALUES('', '$nama', '$waktu', '$isi')");

    return mysqli_affected_rows($connect);
}
?>