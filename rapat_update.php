<?php
include "koneksi.php";

$id = $_POST['id_rapat'];
$peserta = isset($_POST['peserta'])
    ? implode(", ", $_POST['peserta'])
    : '';
    
mysqli_query($koneksi,"UPDATE rapats SET
  judul_rapat='$_POST[judul_rapat]',
  tanggal='$_POST[tanggal]',
  waktu='$_POST[waktu]',
  tempat='$_POST[tempat]',
  pimpinan='$_POST[pimpinan]',
  peserta='$peserta'
WHERE id_rapat='$id'");
