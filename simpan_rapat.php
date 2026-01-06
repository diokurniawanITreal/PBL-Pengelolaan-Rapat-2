<?php
include "koneksi.php";

$judul      = $_POST['judul_rapat'];
$tanggal    = $_POST['tanggal'];
$waktu      = $_POST['waktu'];
$tempat     = $_POST['tempat'];
$pimpinan   = $_POST['pimpinan'];
$peserta = implode(", ", $_POST['peserta']);

$query = mysqli_query($koneksi, "INSERT INTO rapats 
(judul_rapat, tanggal, waktu, tempat, pimpinan, peserta) 
VALUES 
('$judul', '$tanggal', '$waktu', '$tempat', '$pimpinan', '$peserta')");

echo "<script>
    alert('Rapat & peserta berhasil ditambahkan');
    window.location='db_admin.php';
</script>";