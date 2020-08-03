<?php 
// Cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
    // cek username & passsword
    if ( $_POST["username"]=="ard" && $_POST["password"] == "zxc") {
       // Jika benar, Redirect ke halaman admin
       header("Location: admin.php");
       exit;
    } else {
     // Jika salah, Tampilkan pesan kesalahan
     $error = true;
    }
   

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>Login Admin</h1>


<ul>
    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password &nbsp:</label>
        <input type="password" name="password" id="password">
        <br>
        <!-- Cek Password Salah -->
            <?php if (isset($error)) :?> 
                <h4 style="color: red; font-style: italic;">Username/ Password Salah</h4>
            <?php endif;?>
        <button type="submit" name="submit">login</button>
    </form>
</ul>


</body>
</html>