<?php   

// Pengulangan
// For  (ada 3 bagian, 
        // 1. Inisialisasi (index / value pertama)
        // 2. Kondisi deterimiinasi untuk menghentikan pengulangan
        // 3. Increment/decrement (maju/mundur)
// While
// do.. while
// foreach : pengulangan khusus array

// for( $i = 0; $i < 5; $i++ ) {
//     echo "Hello World! <br>";
// }

// $i = 0;
// while( $i < 5 ) {
//     echo "Hello World! <br>";
// $i++;
// }

// $i = 0;
// do {
//     echo "Hello World! <br>";
// $i++;
// } while( $i < 5 );

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan1</title>
    <style>
        .warna-baris {
            background-color: silver;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
<!-- Manual -->
        <!-- <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
            <td>1,5</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
            <td>2,5</td>
        </tr> -->
<!-- With Looping -->
    <!-- <?php 
        for( $i = 1; $i <= 3; $i++ ) {
            echo "<tr>";
            for( $j = 1; $j <= 5; $j++) {
                echo "<td>$i,$j</td>";
            }
            echo "</tr>";
        }
    ?> -->

<!-- Gaya Templating -->
     <?php for( $i = 1; $i <= 5; $i++ ) : ?>
        <?php if($i % 2 == 1 ) : ?>
          <tr class="warna-baris"> 
            <?php else : ?>
            <tr>
        <?php endif; ?>
                <?php for( $j = 1; $j <= 5; $j++) : ?>
                    <td>
                        <?= "$i, $j"; ?>
                    </td>
                <?php endfor;?>
            </tr>
    <?php endfor; ?>
    </table>


</body>
</html>
























