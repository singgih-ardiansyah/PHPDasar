// Ketika halaman sudah dimuat/ready entah itu src di bawah atau diatas tidak ngaruh
$(document).ready(function() {

    // var keyword = document.getElementById('keyword');
    // keyword.addEventListener('keyup', function () {
    //    console.log('ok'); 
    // });

    // Hilangkan tombol cari
    $('#tombolCari').hide();

    // // Event / tempat ketika keyword ditulis
    $('#keyword').on('keyup', function () {
        // Munculkan icon/gif loading
        $('.loader').show();

        // $,get()
        $.get('ajax/siswa.php?keyword=' + $('#keyword').val(), function (data) {
            
            $('#container').html(data);
            $('.loader').hide();
        });

        // jquery pakai LOAD    carikan data yang diketikan (keyword) di container lalu load di siswa.php 
        // $('#container').load('ajax/siswa.php?keyword=' + $('#keyword').val());
        
    });


});
