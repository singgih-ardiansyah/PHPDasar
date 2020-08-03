<?php
// Cek apakah tidak ada data di $_GET
if (
    !isset($_GET["gambar"]) ||
    !isset($_GET["nama"]) ||
    !isset($_GET["nis"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["jurusan"])
) {
    // Redirect to
    header("Location: latihan.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>
<style>
    .resize {
        width: 100px;
        height: 120px;
    }
</style>

<body>
    <ul>
        <img class="resize" src="img/<?= $_GET["gambar"]; ?>">
        <li>Nama : <?= $_GET["nama"] ?></li>
        <li>Nis : <?= $_GET["nis"] ?></li>
        <li>Email : <?= $_GET["email"] ?></li>
        <li>Jurusan: <?= $_GET["jurusan"] ?></li>
    </ul>

    <a href="latihan.php">Kembali</a>
</body>

</html>