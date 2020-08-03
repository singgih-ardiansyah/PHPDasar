<?php
$siswa = [
    [
        "nama" => "singgih1",
        "nis" => "155991",
        "email" => "ard@gmail.com1",
        "jurusan" => "Teknik 
Komputer1",
        "gambar" => "1.jpg"
    ],
    [
        "nama" => "singgih2",
        "nis" => "155992",
        "email" => "ard@gmail.com2",
        "jurusan" => "Teknik 
Komputer2",
        "gambar" => "2.jpg"
    ],
    [
        "nama" => "singgih3",
        "nis" => "155993",
        "email" => "ard@gmail.com3",
        "jurusan" => "Teknik 
Komputer3",
        "gambar" => "3.jpg"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GET</title>
</head>
<style>
    .resize {
        width: 100px;
        height: 120px;
    }
</style>

<body>
    <h1>Daftar Siswa</h1>

    <?php foreach ($siswa as $sw) : ?>
        <ul>
            <a href="latihan2.php?gambar=<?= $sw["gambar"]; ?>&nama=<?= $sw["nama"]; ?>&nis=<?= $sw["nis"]; ?>&email=<?= $sw["email"]; ?>&jurusan=<?= $sw["jurusan"]; ?>
      ">
                <li><?= $sw["nama"]; ?></li>
            </a>
        </ul>
    <?php endforeach; ?>

</body>

</html>