<?php

include 'layout/header.php';

$query = mysqli_query($koneksi, "SELECT Kode_Divisi FROM divisi");

if (isset($_POST['tambah'])) {
    if (create_biodata($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'biodata.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Ditambahkan');
                document.location.href = 'biodata.php';
                </script>";
    }
}

?>
    
<div class="container mt-3">
    <h1>Tambah Biodata</h1>
    <hr>
    
    <form action=""method="post">
        <div class="mb-3">
            <label for="Kode_Anggota" class="form-label">Kode Anggota</label>
            <input type="text" class="form-control" id="Kode_Anggota" name="Kode_Anggota" placeholder="Kode Anggota" required>
        </div>

        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Nama" required>
        </div>

        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="number" class="form-control" id="NIM" name="NIM" placeholder="NIM" required>
        </div>

        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="Jurusan" name="Jurusan" placeholder="Jurusan" required>
        </div>
        <div class="mb-3">
            <label for="No_HP" class="form-label">No HP</label>
            <input type="number" class="form-control" id="No_HP" name="No_HP" placeholder="9 digit" required>
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
        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>