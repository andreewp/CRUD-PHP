<?php

include 'layout/header.php';

$Kd_agt =$_GET['Kode_Anggota'];

$Biodata = select("SELECT * FROM biodata WHERE Kode_Anggota = '$Kd_agt'");

if (isset($_POST['ubah'])) {
    if (update_biodata($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'biodata.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal Diubah');
                document.location.href = 'biodata.php';
              </script>";
    }
}

?>

<div class="container mt-3">
    <h1>Ubah Biodata</h1>
    <hr>

    <form action="" method="post">
        <input type="hidden" name="Kode_Anggota" value="<?= htmlspecialchars($Biodata[0]['Kode_Anggota']); ?>">
        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" value="<?= htmlspecialchars($Biodata[0]['Nama']); ?>" placeholder="Nama">
        </div>
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="number" class="form-control" id="NIM" name="NIM" value="<?= htmlspecialchars($Biodata[0]['NIM']); ?>" placeholder="NIM">
        </div>
        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="Jurusan" name="Jurusan" value="<?= htmlspecialchars($Biodata[0]['Jurusan']); ?>" placeholder="jurusan">
        </div>
        <div class="mb-3">
            <label for="No_HP" class="form-label">No HP</label>
            <input type="number" class="form-control" id="No_HP" name="No_HP" value="<?= htmlspecialchars($Biodata[0]['No_HP']); ?>" placeholder="No HP 9 digit">
        </div>
        <div class="mb-3">
            <label for="Kode_Divisi" class="form-label">Kode Divisi</label>
            <input type="number" class="form-control" id="Kode_Divisi" name="Kode_Divisi" value="<?= htmlspecialchars($Biodata[0]['Kode_Divisi']); ?>" placeholder="Kode Divisi">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>