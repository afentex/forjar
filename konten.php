<?php
session_start();

if(!isset($_SESSION["nama"])){
    header("Location: login");
}
require "functions.php";
$konten = query("SELECT * FROM forum ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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

</body>
</html>