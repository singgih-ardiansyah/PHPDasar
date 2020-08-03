<?php 
// Koneksi ke database
$conn = mysqli_connect ("localhost", "root", "", "phpdasar");

// Ambil/query data dari tabel siswa
$result = mysqli_query($conn, "SELECT * FROM siswa");
// if ( !$result) {
//     echo mysqli_error($conn);
// }
// var_dump($result);

// Ambil/menampilkan data (fetch) siswa dari object result
// Ada 4 Cara 
// 1. mysqli_fetch_row() => Mengembalikan array numerik
// 2. mysqli_fetch_assoc() => Mengembalikan array associative
// 3. mysqli_fetch_array() => Mengembalikan array keduanya
// 4. mysqli_fetch_object() => manggil pake tanda "->' (tidak kepakai)

// Menampilkan
// while ($sw = mysqli_fetch_assoc($result) ) {
// var_dump($sw);
// }

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

    <?php $i = 1 ;?>
   <?php while ( $row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= $i;?></td>
        <td>
            <a href="">Ubah</a> |
            <a href="">Hapus</a>
            </td>
        <td><img src="img/<?= $row["gambar"]; ?> " class=resize></td>
        <td><?= $row["nis"];?></td>
        <td><?= $row["nama"];?></td>
        <td><?= $row["email"];?></td>
        <td><?= $row["jurusan"];?></td>
    </tr>
    <?php $i++ ;?>
   <?php endwhile;?>
</table>

</body>
</html>