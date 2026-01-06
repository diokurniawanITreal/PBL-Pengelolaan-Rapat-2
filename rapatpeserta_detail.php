<?php
include "koneksi.php";
$id = $_GET['id'];

$q = mysqli_query($koneksi,"SELECT * FROM rapats WHERE id_rapat='$id'");
$r = mysqli_fetch_assoc($q);

?>

<table class="table table-bordered">
<tr><th>Judul Rapat</th><td><?= $r['judul_rapat'] ?></td></tr>
<tr><th>Tanggal</th><td><?= $r['tanggal'] ?></td></tr>
<tr><th>Waktu</th><td><?= $r['waktu'] ?></td></tr>
<tr><th>Tempat</th><td><?= $r['tempat'] ?></td></tr>
<tr><th>Pimpinan</th><td><?= $r['pimpinan'] ?></td></tr>
<tr><th>Peserta</th><td><?= $r['peserta'] ?></td></tr>
</table>