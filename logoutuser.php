<?php

session_start();

// menghapus semua data session
session_destroy();

// mengarahkan pengguna kembali ke halaman login
header("Location: userlogin.php");

exit();
?>


