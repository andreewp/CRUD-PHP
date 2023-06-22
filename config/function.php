<?php 

// fungsi menampilkan data
function select($query){
    global $koneksi;

    $result = mysqli_query($koneksi,$query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan

function create_pmnj($post){           
    global $koneksi;

    $anggt = $post['Kode_Anggota'];
    $alt = $post['Kode_Alat'];
    $jmlh = $post['Jumlah_Peminjaman'];
    $tgl1 = $post['Tanggal_Peminjaman'];
    $tgl2 = $post['Tanggal_Pengembalian'];

    // query tambah data
    $query = "INSERT INTO peminjaman VALUES(Null,'$anggt','$alt','$jmlh','$tgl1','$tgl2')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi mengubah data barang

function update_pmnj($post)
{           
    global $koneksi;

    $Kode_Peminjaman = $post['Kode_Peminjaman'];
    $anggt = $post['Kode_Anggota'];
    $alt = $post['Kode_Alat'];
    $jmlh = $post['Jumlah_Peminjaman'];
    $tgl1 = $post['Tanggal_Peminjaman'];
    $tgl2 = $post['Tanggal_Pengembalian'];

    // query ubah data
    $query = "UPDATE peminjaman SET Kode_Anggota = '$anggt',Kode_Alat = '$alt',Jumlah_Peminjaman='$jmlh',Tanggal_Peminjaman='$tgl1',Tanggal_Pengembalian='$tgl2' WHERE Kode_Peminjaman=$Kode_Peminjaman";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menghapus data

function delete_pmnj($Kode_Peminjaman)
{
    global $koneksi;

    // query hapus data
    $query="DELETE FROM peminjaman WHERE Kode_Peminjaman = $Kode_Peminjaman";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

//fungsi menambah jenis alat
function create_alat($post){           
    global $koneksi;

    $kd_alt = $post['Kode_Alat'];
    $kd_dvs = $post['Kode_Divisi'];
    $nm_alt = $post['Nama_Alat'];
    $jml_alt = $post['Jumlah_Alat'];


    // query tambah data
    $query = "INSERT INTO alat VALUES('$kd_alt','$kd_dvs','$nm_alt','$jml_alt')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi mengubah jumlah alat
function update_alat($post)
{           
    global $koneksi;

    $Kode_Alat = $post['Kode_Alat'];
    $ubah_jumlah = $post['Jumlah_Alat'];

    // query ubah data
    $query = "UPDATE alat SET Jumlah_Alat = '$ubah_jumlah' WHERE Kode_Alat='$Kode_Alat'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function delete_alt($Kode_Alat)
{
    global $koneksi;

    // query hapus data
    $query="DELETE FROM alat WHERE Kode_Alat = '$Kode_Alat'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi menambah biodata
function create_biodata($post){           
    global $koneksi;

    $kd_anggota = $post['Kode_Anggota'];
    $nama_anggota = $post['Nama'];
    $nim = $post['NIM'];
    $jurusan = $post['Jurusan'];
    $No_HP = $post['No_HP'];
    $kd_divisi = $post['Kode_Divisi'];


    // query tambah data
    $query = "INSERT INTO biodata VALUES('$kd_anggota','$nama_anggota','$nim','$jurusan','$No_HP','$kd_divisi')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah biodata
function update_biodata($post)
{           
    global $koneksi;

    $kd_agt = $post['Kode_Anggota'];
    $nm = $post['Nama'];
    $nimm = $post['NIM'];
    $jrs = $post['Jurusan'];
    $nhp = $post['No_HP'];
    $dv = $post['Kode_Divisi'];

    // query ubah data
    $query = "UPDATE biodata SET Nama = '$nm',NIM = '$nimm',Jurusan = '$jrs',No_HP = '$nhp' ,Kode_Divisi = '$dv' WHERE Kode_Anggota='$kd_agt'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi hapus biodata
function delete_anggota($Kode_Anggota)
{
    global $koneksi;

    // query hapus data
    $query="DELETE FROM biodata WHERE Kode_Anggota = '$Kode_Anggota'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// tambah user
function create_user($post){           
    global $koneksi;

    $userr = $post['username'];
    $psw = $post['password'];

    // query tambah data
    $query = "INSERT INTO users VALUES(null,'$userr','$psw')";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// hapus user
function delete_user($id_user)
{
    global $koneksi;

    // query hapus data
    $query="DELETE FROM users WHERE id_user = '$id_user'";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

// fungsi ubah biodata
function update_user($post)
{           
    global $koneksi;

    $id_userrr = $post['id_user'];
    $usname = $post['username'];
    $pswww = $post['password'];

    // query ubah data
    $query = "UPDATE users SET username = '$usname', password = '$pswww' WHERE id_user=$id_userrr";

    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}