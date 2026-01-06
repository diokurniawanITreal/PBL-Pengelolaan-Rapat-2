<?php
include "koneksi.php";
$id = $_POST['id'];
mysqli_query($koneksi,"DELETE FROM rapats WHERE id_rapat='$id'");
