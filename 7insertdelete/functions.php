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
    $gambar = htmlspecialchars($post["gambar"]);

    $query = "INSERT INTO siswa 
                VALUES
                (null, '$nama', '$nis', '$email', '$jurusan', '$gambar')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


?>