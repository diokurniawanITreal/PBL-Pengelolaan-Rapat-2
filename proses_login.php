<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM peserta WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);

if ($data) {

    // simpan session
    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role'];

    // cek role user
    if ($data['role'] == "admin") {
        header("Location: db_admin.php");
        exit();
    } 
    else if ($data['role'] == "peserta") {
        header("Location: db_peserta.php");
        exit();
    } 
    else {
        echo "Role tidak dikenal!";
    }

} else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
}
?>