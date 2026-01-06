<?php
include "koneksi.php";
$id = $_POST['id'];
mysqli_query($koneksi,"DELETE FROM peserta WHERE id_peserta='$id'");
