<?php 
$siswa = [
    ["singgih ardiansyah", "15599", "Teknik Komputer", "ard@gmail.com"],
    ["singgih1", "1", "Teknik Komputer1", "ard@gmail.com1"],
    ["singgih2", "2", "Teknik Komputer1", "ard@gmail.com2"]
];

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <title>Daftar siswa</title>
</head>
<body>
    <h1>Daftar Siswa</h1>
<!-- Manual -->
<!-- <ul>
    <li>Singgih Ardiansyah</li>
    <li>15599</li>
    <li>Teknik Komputer</li>
    <li>ard@gmail.com</li>    
</ul> -->

<!-- Foreach -->
<!-- <ul> -->
    <!-- <?php foreach ($siswa as $sw ) :?> -->
        <!-- <li><?=$sw;?></li> -->
    <!-- <?php endforeach;?> -->
<!-- </ul> -->

<?php foreach( $siswa as $sw ) : ?>
<ul>
    <li>Nama :<?= $sw[0];?></li>
    <li>NIS  :<?= $sw[1];?></li>
    <li>Jurusan:<?= $sw[2];?></li>
    <li>Email :<?= $sw[3];?></li>
</ul>
<?php endforeach;?>
</body>
</html>