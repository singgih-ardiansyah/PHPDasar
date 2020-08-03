<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($post) {
    global $conn;
    $nama = htmlspecialchars($post["nama"]);
    $nis = htmlspecialchars($post["nis"]);
    $email = htmlspecialchars($post["email"]);
    $jurusan = htmlspecialchars($post["jurusan"]);
    // $gambar = htmlspecialchars($post["gambar"]);

    // Upload Gambar
    $gambar = upload();
    if( !$gambar ) {
        return false;
    }
    $query = "INSERT INTO siswa 
                VALUES
                (null, '$nama', '$nis', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    // return false;
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada gambar yang sudah diupload
    if( $error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // Cek yang diupload harus gambar
    $formatGambarValid = ['jpg', 'jpeg', 'png'];
    $formatGambar = explode('.', $namaFile);
    $formatGambar = strtolower(end($formatGambar));
    if( !in_array($formatGambar, $formatGambarValid) ) {
        echo "<script>
                alert('Upload harus gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
                alert('Ukuran Gambar Terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar masukkan ke direktori
    // Generate Nama gambar baru agar gambar tidak ditimpa
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $formatGambar;

    // var_dump($namaFileBaru); die;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($post) {
    global $conn;
    
    $id = $post["id"];
    $nama = htmlspecialchars($post["nama"]);
    $nis = htmlspecialchars($post["nis"]);
    $email = htmlspecialchars($post["email"]);
    $jurusan = htmlspecialchars($post["jurusan"]);
    $gambarLama = htmlspecialchars($post["gambarLama"]);

    // Cek apakah user pilih gambar  baru atau tidak
    if( $_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE siswa SET 
            nama = '$nama',
            nis = '$nis',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
            WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM siswa
                WHERE
                nama LIKE '%$keyword%' OR
                nis LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%'
            ";
    return query($query);
}

function registrasi($post) {
    global $conn;

    $username = strtolower(stripslashes($post["username"]));
    $password = mysqli_real_escape_string($conn, $post["password"]);
    $konfpass = mysqli_real_escape_string($conn, $post["konfpass"]);

// CEK USER SUDAH DIBUAT ATAU BELUM
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if ( mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('Username sudah ada, cari yang lain!');
            </script>
        ";
        return false;
    }


// Cek konfirmasi password
    if( $password !== $konfpass ) {
        echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai');
            </script>
        ";
        return false;
    }
    // return 1 untuk mengecek berhasil buat user
    // return 1; 

// Enkripsi password
    // md5 (tidak aman, bisa di search)
    // $password = md5($password);
    // password_hast(variabel, algoritma)
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

// tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users VALUE(null, '$username', '$password')");

    return mysqli_affected_rows($conn);
}
