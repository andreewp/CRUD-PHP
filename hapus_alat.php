<?php

include 'config/app.php';

// menerima Kode alat yang dipilih
$Kode_Alat=$_GET['Kode_Alat'];

if(delete_alt($Kode_Alat)>0){
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'alat.php';
         </script>";
} else {
    echo "<script>
            alert('Data Gagal Dihapus');
            document.location.href = 'alat.php';
         </script>";
}