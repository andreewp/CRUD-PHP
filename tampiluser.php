<?php

session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: userlogin.php");
    exit;
}

$title = 'tabel User';
include  'layout/header.php';

$data_akun = select("SELECT * FROM users");

// cek tombol
if (isset($_POST['tambah'])) {
    if (create_user($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'tampiluser.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Ditambahkan');
                document.location.href = 'tampiluser.php';
                </script>";
    }
}

if (isset($_POST['ubah'])) {
    if (update_user($_POST) > 0) {
        echo  "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'tampiluser.php';
                </script>";
    } else {
        echo "<script>
                alert('Data gagal Diubah');
                document.location.href = 'tampiluser.php';
                </script>";
    }
}

?>

<div class="container mt-3">
        <h1><i class="fas fa-users"></i> Tabel User</h1>
        <hr>
        
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah</button>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">username</th>
                <th class="text-center">password</th>
                <th class="text-center">Aksi</th>
            </thead>

            <tbody>
               <?php $no =1; ?>
               <?php foreach ($data_akun as $akun) : ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td class="text-center"><?= $akun['username']; ?></td>
                    <td class="text-center"><?= $akun['password']; ?></td>
                    <td width="20%" class="text-center">
                        <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_user']; ?>"><i class="fas fa-edit"></i> ubah</button>
                        <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_user']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>

<!-- tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
        <div class="mb-3">
            <label for="username">username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ubah -->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username">username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control" value="<?= $akun['password']; ?>" required>
                    </div>
                    <input type="hidden" name="id_user" value="<?= $akun['id_user']; ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
            </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>


<!-- hapus -->
<?php foreach($data_akun as $akun): ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_user']; ?>"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">    
        <p>Ingin hapus akun?</p>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="hapususer.php?id_user=<?= $akun['id_user']; ?>" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
 </div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>