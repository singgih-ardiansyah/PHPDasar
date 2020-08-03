<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <!-- Agar pertama tidak error -->
    <?php
    if (isset($_POST["submit"])) : ?>
        <h1>Selamat datang, <?= $_POST["submit"] ?></h1>
    <?php endif; ?>

    <!-- Kirim Dengan GET -->
    <!-- <form action="latihan4.php" method="get">  -->
    <!-- Kirim ke Halaman Ini Sendiri -->
    <!-- <form action="" method="post"> -->
    <!-- Kirim Dengan POST -->
    <form action="latihan4.php" method="post">
        Masukkan Nama :
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">KIRIM!</button>
    </form>


</body>

</html>