<?php

include 'config/app.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <title>Astacala</title>
</head>
<body>
    
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" style="font-size: 30px;">Astacala</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="divisi.php">Divisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="biodata.php">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="alat.php">Alat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tampiluser.php">User</a>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="logoutuser.php" method="post">
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>