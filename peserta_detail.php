<?php
include "koneksi.php";
$id = $_GET['id'];

$q = mysqli_query($koneksi,"SELECT * FROM peserta WHERE id_peserta='$id'");
$p = mysqli_fetch_assoc($q);
?>

<table class="table table-bordered">
<tr><th>Nama Peserta</th><td><?= $p['username'] ?></td></tr>
<tr><th>Nik/Nim</th><td><?= $p['nik_nim'] ?></td></tr>
<tr><th>Email</th><td><?= $p['email'] ?></td></tr>
<tr><th>No-Hp</th><td><?= $p['no_hp'] ?></td></tr>
<tr><th>Jabatan/Status</th><td><?= $p['jabatan'] ?></td></tr>
<tr><th>Password</th><td><?= $p['password'] ?></td></tr>
<tr><th>Role</th><td><?= $p['role'] ?></td></tr>
</table>
