<?php
session_start();

if(!isset($_SESSION["namaAdmin"])) {
    header("Location: login.php");
    exit;
}

require "../functions.php";
$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
        <script>
            alert('data BERHASIL dihapus!');
            document.location.href='index.php';
        </script>
        ";
} else{
    echo "
        <script>
            alert('data GAGAL dihapus!');
            document.location.href='index.php';
        </script>
        ";
}
?>