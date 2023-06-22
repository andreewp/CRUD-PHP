<?php

include 'layout/header.php';

$Kode_Alat = $_GET['Kode_Alat'];

$alat = select("SELECT * FROM alat WHERE Kode_Alat = '$Kode_Alat'");

if (isset($_POST['ubah'])) {
    if (update_alat($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'alat.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal Diubah');
                document.location.href = 'alat.php';
              </script>";
    }
}

?>

<div class="container mt-3">
    <h1>Ubah Alat</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="Kode_Alat" value="<?= htmlspecialchars($alat[0]['Kode_Alat']); ?>">
        <div class="mb-3">
            <label for="Jumlah_Alat" class="form-label">Jumlah Alat</label>
            <input type="number" class="form-control" id="Jumlah_Alat" name="Jumlah_Alat" value="<?= htmlspecialchars($alat[0]['Jumlah_Alat']); ?>" placeholder="Jumlah Alat">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
