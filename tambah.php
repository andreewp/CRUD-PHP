<?php

include 'layout/header.php';

$query = mysqli_query($koneksi, "SELECT Kode_Alat FROM alat");


if (isset($_POST['tambah'])) {
    if (create_pmnj($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Ditambahkan');
                document.location.href = 'index.php';
                </script>";
    }
}

?>
    
<div class="container mt-3">
    <h1>Tambah Peminjaman</h1>
    <hr>
    
    <form action=""method="post">
        <div class="mb-3">
            <label for="Kode_Anggota" class="form-label">Kode Anggota</label>
            <input type="text" class="form-control" id="Kode_Anggota" name="Kode_Anggota" placeholder="Kode Anggota" required>
        </div>

        <div class="mb-3">
            <label for="Kode_Alat" class="form-label">Kode Alat</label>
            <select class="form-control" id="Kode_Alat" name="Kode_Alat" required>
                <?php
                // Generate opsi dari data tabel alat
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row['Kode_Alat'] . '">' . $row['Kode_Alat'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="Jumlah_Pengembalian" class="form-label">Jumlah Peminjaman</label>
            <input type="number" class="form-control" id="Jumlah_Peminjaman" name="Jumlah_Peminjaman" placeholder="Jumlah Peminjaman" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal_Peminjaman" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="Tanggal_Peminjaman" name="Tanggal_Peminjaman" placeholder="Tanggal Peminjaman" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal_Pengembalian" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="Tanggal_Pengembalian" name="Tanggal_Pengembalian" placeholder="Tanggal Pengembalian" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>