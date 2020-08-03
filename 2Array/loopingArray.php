<?php 
// pengulangan pada array
// for / foreach

$angka = [1,2,3,4,5,6,7];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan 2</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: blue;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
<!-- Menggunakan FOR -->
<?php for($i = 0; $i < count($angka); $i++ ) { ?>
    <div class="kotak"><?= $angka[$i];?></div>
<?php }?>

<div class="clear"></div>

<!-- Menggunakan FOREACH -->
<!-- $angka jamak $a singular -->

<?php foreach( $angka as $a ) :?> 
    <div class="kotak"><?= $a; ?></div>
<?php endforeach;?>



</body>
</html>