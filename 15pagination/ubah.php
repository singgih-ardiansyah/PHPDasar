<?php
session_start();

if ( !isset($_SESSION["login"] ) ) {
    header("location: login.php");
    exit;
}
require 'functions.php';

//Ambil id di URL

$id = $_GET["id"];

// Query data siswa berdasarkan id
$sw = query("SELECT * FROM siswa WHERE id = $id")[0];
// var_dump($sw["nis"]);

if( isset($_POST["submit"]) ) {
// Cek apakah data berhasil diubah/tidak
    if ( ubah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal diubah!');
            document.location.href = 'index.php'
        </script>
        ";
    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data Siswa</title>
</head>
<body>
    <h1>Ubah data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">  
        <input type="hidden" name="id" value="<?= $sw["id"];?>">
        <input type="hidden" name="gambarLama" value="<?= $sw["gambar"];?>">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required
                value="<?= $sw["nama"];?>">
            </li>
            <li>
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis"
                value="<?= $sw["nis"];?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email"
                value="<?= $sw["email"];?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan"
                value="<?= $sw["jurusan"];?>">
            </li>
            <li>
                <label for="gambar">Gambar</label> <br>
                <img src="img/<?= $sw['gambar']; ?>" width="50"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">ubah Data</button>
            </li>
        </ul>
    
    </form>








</body>
</html>