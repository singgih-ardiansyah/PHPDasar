<?php
require 'functions.php';

$siswa = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
</head>
<style>
    .resize {
        width: 80px;
        height: 100px;
    }
</style>

<body>

    <h1>Daftar Mahasiswa</h1>

    <table border="2" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($siswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?> " class=resize></td>
                <td><?= $row["nis"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>