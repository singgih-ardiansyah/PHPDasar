// console.log('Terload');

// 1. Ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombolCari');
var container = document.getElementById('container');


// Tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
// Menangkap semua value
    // console.log(keyword.value);

    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200) {
            // Menampilan isi console
            // console.log('tampilkanlurd');
            // console.log(xhr.responseText);

            // mengambil respon text dan menampilkan ke table/container
            container.innerHTML = xhr.responseText;
        }
    }

    // jika ajax sudah siap, Eksekusi Ajax (method, sumber file, jika true= assyncronus)
    xhr.open('GET', 'ajax/siswa.php?keyword=' + keyword.value, true)
    xhr.send();

});
