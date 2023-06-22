<?php

include 'config/app.php';

// menerima Kode Anggota yang dipilih
$Kode_Anggota=$_GET['Kode_Anggota'];

if(delete_anggota($Kode_Anggota)>0){
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'biodata.php';
         </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'biodata.php';
         </script>";
}