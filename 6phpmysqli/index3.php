<?php 
require 'functions3.php';

$siswa = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
    <style>
    .resize {
        width: 80px;
        height: 100px;
    }
    </style>
<body>
    <h1>DAFTAR SISWA SMKN 1 Purbalingga</h1>
    <table border="2", cellpadding="10", callspacing="0">
       <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Profile</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>
        <?php $i = 1;?>
        <?php foreach ( $siswa as $sw ) :  ?>
        <tr>
            <td><?= $i;?></td>
            <td>
            <a href="">Edit</a> | <a href="">Hapus</a>
            </td>
            <td><img src="img/<?= $sw["gambar"];?>" alt="Singgih Ardiansyahh" class=resize></td>
            <td><?=$sw["nis"] ;?></td>
            <td><?=$sw["nama"] ;?></td>
            <td><?=$sw["email"] ;?></td>
            <td><?=$sw["jurusan"] ;?></td>
        </tr>
        <?php $i++?>
        <?php endforeach;?>
    </table>
</body>
</html>