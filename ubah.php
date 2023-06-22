<?php

include 'layout/header.php';

$Kode_Peminjaman = (int)$_GET['Kode_Peminjaman'];

$pinjam = select("SELECT * FROM peminjaman WHERE Kode_Peminjaman = $Kode_Peminjaman")[0];

if (isset($_POST['ubah'])) {
    if (update_pmnj($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Diubah');
                document.location.href = 'index.php';
                </script>";
    }
}

?>
    
<div class="container mt-3">
    <h1>Ubah Peminjaman</h1>
    <hr>
    
    <form action=""method="post">
        <input type="hidden" name="Kode_Peminjaman" value="<?= $pinjam['Kode_Peminjaman']; ?>">
        <div class="mb-3">
            <label for="Kode_Anggota" class="form-label">Kode Anggota</label>
            <input type="text" class="form-control" id="Kode_Anggota" name="Kode_Anggota" value="<?= $pinjam['Kode_Anggota']; ?>" placeholder="Kode Anggota">
        </div>

        <div class="mb-3">
            <label for="Kode_Alat" class="form-label">Kode Alat</label>
            <input type="text" class="form-control" id="Kode_Alat" name="Kode_Alat" value="<?= $pinjam['Kode_Alat']; ?>" placeholder="Kode Alat">
        </div>

        <div class="mb-3">
            <label for="Jumlah_Peminjaman" class="form-label">Jumlah Peminjaman</label>
            <input type="number" class="form-control" id="Jumlah_Peminjaman" name="Jumlah_Peminjaman" value="<?= $pinjam['Jumlah_Peminjaman']; ?>" placeholder="Jumlah Peminjaman">
        </div>

        <div class="mb-3">
            <label for="Tanggal_Peminjaman" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="Tanggal_Peminjaman" name="Tanggal_Peminjaman" value="<?= $pinjam['Tanggal_Peminjaman']; ?>" placeholder="Tanggal Peminjaman">
        </div>

        <div class="mb-3">
            <label for="Tanggal_Pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="Tanggal_Pengembalian" name="Tanggal_Pengembalian" value="<?= $pinjam['Tanggal_Pengembalian']; ?>"  placeholder="Tanggal Pengembalian">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;">Ubah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>