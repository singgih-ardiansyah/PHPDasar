<?php 
session_start();
require 'functions.php';

// cek apakah ada cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // AMBIL USERNAME BERDASARKAN ID
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // CEK APAKAH COOKIE DAN USERNAME SAMA

    if ( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if ( isset($_SESSION['login'])) {
    header("Location: index.php");
}


if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // CEK USERNAME, mysqli_num untuk menghitung baris
    if ( mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            
            // SET SESSION UNTUK MENCEGAH LOGIN
            $_SESSION["login"] = true;

            // CEK Remember Me
            if ( isset($_POST["remember"])) {
                // BUAT COOKIE
                // setcookie('login', 'true', time() + 60);
                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }
            header("location: index.php");
            exit;
        }
    }

    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    
<h1>Halaman Login</h1>

<form action="" method="post">  
    <ul>
        <li>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </li>
        <li>
            <label for="password">Passowrd</label>
            <input type="password" name="password" id="password">
        </li>
        <?php if ( isset($error) ) : ?>
             <p style="color: red; font-style: italic">Username / Password Salah</p>
        <?php endif;?>  
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </li>
        <li>
            <button type="submit" name="login">LOGIN!</button>
        </li>
    </ul>

</form>










</body>
</html>