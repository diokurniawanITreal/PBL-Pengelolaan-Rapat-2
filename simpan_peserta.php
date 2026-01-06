<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$niknim  = $_POST['nik_nim'];
$email   = $_POST['email'];
$nohp    = $_POST['no_hp'];
$jabatan = $_POST['jabatan'];
$role    = $_POST['role'];

// query insert
$query = mysqli_query($koneksi, "
    INSERT INTO peserta 
    (username, password, nik_nim, email, no_hp, jabatan, role)
    VALUES 
    ('$username', '$password', '$niknim', '$email', '$nohp', '$jabatan', '$role')
");

if ($query) {
    echo "<script>
        alert('Data peserta berhasil ditambahkan');
        window.location='db_admin.php';
    </script>";
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
