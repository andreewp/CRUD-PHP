<?php

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}

include  'layout/header.php';
$title = 'tabel biodata';


//menampilkan data biodata
$data_Biodata = select("SELECT * FROM biodata");

?>

<div class="container mt-3">
        <h1><i class="fas fa-users"></i>  Tabel Biodata</h1>
        <hr>
        <a href="biodata.php"></a>
        <a href="tambah_biodata.php" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">Kode Anggota</th>
                <th class="text-center">Nama Anggota</th>
                <th class="text-center">NIM</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">No HP</th>
                <th class="text-center">Kode Divisi</th>
                <th class="text-center">Aksi</th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_Biodata as $Biodata): ?>
                    <tr>
                        <td class="text-center" width='5%'><?= $no++; ?> </td>
                        <td class="text-center" width='10%'><?= $Biodata['Kode_Anggota']; ?></td>
                        <td class="text-center"><?= $Biodata['Nama']; ?></td>
                        <td class="text-center"><?= $Biodata['NIM']; ?></td>
                        <td class="text-center"><?= $Biodata['Jurusan']; ?></td>
                        <td class="text-center"><?= $Biodata['No_HP']; ?></td>
                        <td class="text-center" width='10%'><?= $Biodata['Kode_Divisi']; ?></td>
                        <td class="text-center">
                        <a href="ubah_biodata.php?Kode_Anggota=<?= $Biodata['Kode_Anggota']; ?>"class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus_biodata.php?Kode_Anggota=<?= $Biodata['Kode_Anggota']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php';?>