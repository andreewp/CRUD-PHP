<?php

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}

include  'layout/header.php';
$title = 'tabel alat';


//menampilkan data divisi
$data_alat = select("SELECT * FROM alat");

?>

<div class="container mt-3">
        <h1><i class="fas fa-tools fa-spin"></i> Tabel Alat</h1>
        <hr>
        <a href="alat.php"></a>
        <a href="tambah_alat.php" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">Kode Alat</th>
                <th class="text-center">Kode Divisi</th>
                <th class="text-center">Nama Alat</th>
                <th class="text-center">Jumlah Alat</th>
                <th class="text-center">Aksi</th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_alat as $alat): ?>
                    <tr>
                        <td class="text-center" width='15%'><?= $no++; ?> </td>
                        <td class="text-center"><?= $alat['Kode_Alat']; ?></td>
                        <td class="text-center"><?= $alat['Kode_Divisi']; ?></td>
                        <td class="text-center"><?= $alat['Nama_Alat']; ?></td>
                        <td class="text-center" width="15%"><?= $alat['Jumlah_Alat']; ?></td>
                        <td class="text-center">
                        <a href="ubah_alat.php?Kode_Alat=<?= $alat['Kode_Alat']; ?>"class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus_alat.php?Kode_Alat=<?= $alat['Kode_Alat']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php';?>