<?php
include "koneksi.php";

$id       = $_POST['id_peserta'];
$username = $_POST['username'];
$niknim   = $_POST['nik_nim'];
$email    = $_POST['email'];
$nohp     = $_POST['no_hp'];
$jabatan  = $_POST['jabatan'];
$role     = $_POST['role'];

if (!empty($_POST['password'])) {
    $password = $_POST['password'];
    mysqli_query($koneksi,"
        UPDATE peserta SET
        username='$username',
        password='$password',
        nik_nim='$niknim',
        email='$email',
        no_hp='$nohp',
        jabatan='$jabatan',
        role='$role'
        WHERE id_peserta='$id'
    ");
} else {
    mysqli_query($koneksi,"
        UPDATE peserta SET
        username='$username',
        nik_nim='$niknim',
        email='$email',
        no_hp='$nohp',
        jabatan='$jabatan',
        role='$role'
        WHERE id_peserta='$id'
    ");
}

header("location:db_admin.php");
