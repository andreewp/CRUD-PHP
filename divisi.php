<?php

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}

include  'layout/header.php';
$title = 'tabel divisi';


//menampilkan data divisi
$data_divisi = select("SELECT * FROM divisi");

?>

<div class="container mt-3">
        <h1><i class="fas fa-list"></i> Tabel Divisi</h1>
        <hr>
        <a href="divisi.php"></a>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">Kode Divisi</th>
                <th class="text-center">Nama Divisi</th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_divisi as $divisi): ?>
                    <tr>
                        <td class="text-center" width='15%'><?= $no++; ?> </td>
                        <td class="text-center"><?= $divisi['Kode_Divisi']; ?></td>
                        <td class="text-center"><?= $divisi['Nama_Divisi']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php';?>