<?php
include "koneksi.php";

$nama = $_POST['nama'] ?? '';
$nik = $_POST['nik'] ?? '';
$jabatan = $_POST['jabatan'] ?? '';

$sql = "SELECT * FROM peserta WHERE 1";

if (!empty($nama)) {
    $sql .= " AND username LIKE '%$nama%'";
}

if (!empty($nik)) {
    $sql .= " AND nik_nim LIKE '%$nik%'";
}

if (!empty($jabatan)) {
    $sql .= " AND jabatan = '$jabatan'";
}

$query = mysqli_query($koneksi, $sql);

$no = 1;
if (mysqli_num_rows($query) > 0) {
    while ($p = mysqli_fetch_assoc($query)) {
        echo "
        <tr>
            <td>$no</td>
            <td>{$p['username']}</td>
            <td>{$p['nik_nim']}</td>
            <td>{$p['email']}</td>
            <td>{$p['no_hp']}</td>
            <td>{$p['jabatan']}</td>
            <td>{$p['password']}</td>
            <td>{$p['role']}</td>
            <td>
                <button class='btn btn-success btn-sm btn-viewpeserta'
                    data-id='{$p['id_peserta']}'>👁</button>

                <button class='btn btn-warning btn-sm btn-editpeserta'
                    data-id='{$p['id_peserta']}'>✏</button>

                <button class='btn btn-danger btn-sm btn-deletepeserta'
                    data-id='{$p['id_peserta']}'>🗑</button>
            </td>
        </tr>
        ";
        $no++;
    }
} else {
    echo "<tr><td colspan='9' class='text-center'>Data tidak ditemukan</td></tr>";
}
