<?php

include 'config/app.php';

// menerima Kode user yang dipilih
$id_user=(int)$_GET['id_user'];

if(delete_user($id_user)>0){
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'tampiluser.php';
         </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'tampiluser.php';
         </script>";
}