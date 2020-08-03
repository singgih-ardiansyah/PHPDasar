<?php
// array
// Variabel yang dapat memiliki banyak nilai
// Elemen pada array boleh memiliki tipe data yang berbeda
// Pasangan antara key dan value
// Key-nya adalah index, yang dimulai dari 0


// Membuat array
// 1. Cara lama
$hari = array("senin", "selasa", "rabu");

// 2. Cara Baru
$bulan = ["Januari", "Februari", "Maret"];

$arr1 = [123, "tulisan", false];

// Menampilkan array
// 1. var_dump() / print_r()

var_dump($hari);
echo "<br>";
print_r($bulan);

// 2. Echo (Untuk 1 elemen array)
echo "<br>";
echo $arr1[0];
echo "<br>";echo "<br>";echo "<br>";

// menambahkan elemen baru pada array

var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jum'at";
echo "<br>";
var_dump($hari);
echo "<br>";echo "<br>";echo "<br>";

// Pengulangan pada Array
// For / foreach
$angka = [3,2,15,20,22,77,89];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Latihan 2</title>
</head>
<body>
    
</body>
</html>
