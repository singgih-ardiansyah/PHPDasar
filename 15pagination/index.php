<?php 
session_start();

if ( !isset($_SESSION["login"] ) ) {
    header("location: login.php");
    exit;
}
require 'functions.php';

// PAGINATION
// konfigurasi

// Cara mencari jumlah data untuk halaman (CARA 1)
// $result = mysqli_query($conn, "SELECT * FROM siswa");
// $jmlData = mysqli_num_rows($result);
// round membulatkan ke dekat
// floor membulatkan ke bawah
// ceil membulatkan ke atas

$jmlDataPerhalaman = 2;
$jmlData = count(query("SELECT * FROM siswa"));
$jmlPerhalaman = ceil($jmlData / $jmlDataPerhalaman);
$halAktif = ( isset($_GET["page"]) ) ? $_GET["page"] : 1;
// halaman = 2, awalData 2
// halaman = 3, awalData 4
$awalData = ( $jmlDataPerhalaman * $halAktif ) - $jmlDataPerhalaman;


$siswa = query("SELECT * FROM siswa LIMIT $awalData, $jmlDataPerhalaman");

// Order By id
// ASC dari kecil ke besar
// DESC dari besar ke kecil

// Jika tombol cari ditekan
if ( isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Admin</title>
</head>
    <style>
        .resize{
            width: 80px;
            height: 100px;
        }
    </style>
<body>
<a href="logout.php">LogOut</a>

    <h1>Daftar Siswa</h1>
<a href="tambah.php">Tambah Data Siswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" id="" size="50" autofocus placeholder="masukkan nama..." autocomplete="off">
    <button type="submit" name="cari">Cari!</button>
</form>
<br>

<!-- Navigasi -->
<!-- Panah -->
<?php if( $halAktif > 1) :?>
<a href="?page=<?= $halAktif - 1; ?>">&laquo;</a>
<?php endif;?>
<!-- Nomer -->
<?php for ( $i = 1; $i <= $jmlPerhalaman; $i++) : ?>
    <?php if( $i == $halAktif) : ?>
        <a href="?page=<?= $i;?>" style="font-weight: bold;"><?= $i; ?></a>
    <?php else : ?>
        <a href="?page=<?= $i;?>"><?= $i; ?></a>
    <?php endif; ?>
<?php endfor; ?>
<!-- Panah -->
<?php if( $halAktif < $jmlPerhalaman) :?>
<a href="?page=<?= $halAktif + 1; ?>">&raquo;</a>
<?php endif;?>
<br>
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

</body>
</html>