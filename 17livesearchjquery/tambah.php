<?php
session_start();

if ( !isset($_SESSION["login"] ) ) {
    header("location: login.php");
    exit;
}
require 'functions.php';

if( isset($_POST["submit"]) ) {
/* 
    var_dump($_POST);
    var_dump($_FILES); 
    die;
 */
// Cek apakah data berhasil ditambah/tidak
    if ( tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil ditambah!');
            // document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal ditambah!');
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
    <title>Tambah data Siswa</title>
</head>
<body>
    <h1>Tambah data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">  
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nis">NIS</label>
                <input type="text" name="nis" id="nis">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    
    </form>








</body>
</html>