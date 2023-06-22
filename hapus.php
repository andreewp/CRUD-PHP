<?php

include 'config/app.php';

// menerima Kode peminjaman yang dipilih
$Kode_Peminjaman=(int)$_GET['Kode_Peminjaman'];

if(delete_pmnj($Kode_Peminjaman)>0){
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
         </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'index.php';
         </script>";
}