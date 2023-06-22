<?php

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}

include 'layout/header.php';

$peminjamanbarang = select("SELECT * FROM peminjaman");

?>

    <div class="container mt-3">
        <h1><i class="fas fa-toolbox fa-spin"></i>  Tabel Peminjaman</h1>
        <hr>
        <a href="tambah.php" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">Kode Anggota</th>
                <th class="text-center">Kode Alat</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Tanggal peminjaman</th>
                <th class="text-center">Tanggal Pengembalian</th>
                <th class="text-center" >Aksi</th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($peminjamanbarang as $pinjam) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $pinjam['Kode_Anggota']; ?></td>
                    <td class="text-center"><?= $pinjam['Kode_Alat']; ?></td>
                    <td class="text-center"><?= $pinjam['Jumlah_Peminjaman']; ?></td>
                    <td width="15%" class="text-center"><?= $pinjam['Tanggal_Peminjaman']; ?></td>
                    <td width="15%" class="text-center"><?= $pinjam['Tanggal_Pengembalian']; ?></td>
                    <td class="text-center">
                        <a href="ubah.php?Kode_Peminjaman=<?= $pinjam['Kode_Peminjaman']; ?>"class="btn btn-success"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus.php?Kode_Peminjaman=<?=$pinjam['Kode_Peminjaman']; ?>"class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include 'layout/footer.php'; ?>