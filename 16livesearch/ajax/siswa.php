<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM siswa
            WHERE
        nama LIKE '%$keyword%' OR
        nis LIKE '%$keyword%' OR
        jurusan LIKE '%$keyword%'
        ";
$siswa = query($query);

// var_dump($siswa);

?>

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

    <?php $i = 1 ;?>
   <?php foreach ($siswa as $sw) : ?>
    <tr>
        <td><?= $i;?></td>
        <td>
            <a href="ubah.php?id=<?= $sw["id"];?>">Ubah</a> |
            <a href="hapus.php?id=<?= $sw["id"];?>" onclick="return confirm('Apakah Anda Yakin?');">Hapus</a>
            </td>
        <td><img src="img/<?= $sw["gambar"]; ?> " class=resize></td>
        <td><?= $sw["nis"];?></td>
        <td><?= $sw["nama"];?></td>
        <td><?= $sw["email"];?></td>
        <td><?= $sw["jurusan"];?></td>
    </tr>
    <?php $i++ ;?>
   <?php endforeach;?>
</table>