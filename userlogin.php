<?php
session_start();

include 'config/app.php';

//check apakah tombol login ditekan
if (isset($_POST['login'])) {
    // ambil input username dan password
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // ambil data user dari database
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    // jika ada usernya
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // memeriksa password
        if ($password === $user['password']) {
            // password cocok, login berhasil
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit;
        }
    }

    // jika tidak ada user / password salah
    $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Sumber font dari Google -->
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&family=Roboto:wght@100&display=swap');</style>
    <!-- Sumber Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Sumber style.css -->
    <link rel="stylesheet" type="text/css" href="testi.css">
</head>
<body>
    <div class="header">
        <div class="row">
            <div class="col-md-4">
                <div class="textlogo">ASTACALA</div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="hero">
        <div class="row">
            <div class="col-md-6">
                <div class="texthero">
                    Aplikasi Manajemen Perlengkapan UKM Astacala
                </div>
            </div>
            <div class="col-md-6">
                <div class="formhero">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>Selamat Datang</h1>
                            <?php if(isset($error)) : ?>
                                <div class="alert alert-danger text-center">
                                    <b>Username/Password salah</b>
                                </div>
                            <?php endif; ?> 
                            <form role="form" action="" method="POST">   
                                <div class="form-group">
                                    <label for="username"><h4>Username</h4></label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password"><h4>Password</h4></label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
