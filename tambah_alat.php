<?php

include 'layout/header.php';

$query = mysqli_query($koneksi, "SELECT Kode_Divisi FROM divisi");


if (isset($_POST['tambah'])) {
    if (create_alat($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'alat.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Ditambahkan');
                document.location.href = 'alat.php';
                </script>";
    }
}

?>
    
<div class="container mt-3">
    <h1>Tambah Alat</h1>
    <hr>
    
    <form action=""method="post">
        <div class="mb-3">
            <label for="Kode_Alat" class="form-label">Kode Alat</label>
            <input type="text" class="form-control" id="Kode_Alat" name="Kode_Alat" placeholder="Kode Alat" required>
        </div>

        <div class="mb-3">
            <label for="Kode_Divisi" class="form-label">Kode Divisi</label>
            <select class="form-control" id="Kode_Divisi" name="Kode_Divisi" required>
                <?php
                // Generate opsi dari data tabel alat
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<option value="' . $row['Kode_Divisi'] . '">' . $row['Kode_Divisi'] . '</option>';
                }
                ?>
            </select>           
        </div>

        <div class="mb-3">
            <label for="Nama_Alat" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" id="Nama_Alat" name="Nama_Alat" placeholder="Nama ALat" required>
        </div>

        <div class="mb-3">
            <label for="Jumlah_Alat" class="form-label">Jumlah Alat</label>
            <input type="number" class="form-control" id="Jumlah_Alat" name="Jumlah_Alat" placeholder="Jumlah Alat" required>
        </div>


        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>