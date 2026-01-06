<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "db_pengelolaanrapat";
$koneksi = mysqli_connect($host, $user, $pass, $database);

if(!$koneksi){
    die("Koneksi Gagal  : " . mysqli_connect_error());
}

?>