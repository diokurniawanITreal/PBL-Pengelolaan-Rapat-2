<?php
include "koneksi.php";

$id = intval($_GET['id']); // amankan ID

$q = mysqli_query($koneksi, "SELECT * FROM peserta WHERE id_peserta='$id'");
$p = mysqli_fetch_assoc($q);

if (!$p) {
    die("Data peserta tidak ditemukan");
}
?>


<input type="hidden" name="id_peserta" value="<?= $p['id_peserta']; ?>">

<!-- ROW 1 -->
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-bold">Nama Peserta</label>
        <input type="text" name="username" class="form-control"
               value="<?= htmlspecialchars($p['username']); ?>" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold">NIK / NIM</label>
        <input type="number" name="nik_nim" class="form-control"
               value="<?= htmlspecialchars($p['nik_nim']); ?>" required>
    </div>
</div>

<!-- ROW 2 -->
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-bold">Password (kosongkan jika tidak diganti)</label>
        <input type="password" name="password" class="form-control"
               placeholder="Password baru">
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold">No Handphone</label>
        <input type="number" name="no_hp" class="form-control"
               value="<?= htmlspecialchars($p['no_hp']); ?>">
    </div>
</div>

<!-- ROW 3 -->
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-bold">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= htmlspecialchars($p['email']); ?>">
    </div>

    <div class="col-md-6">
        <label class="form-label fw-bold">Jabatan</label>
        <select class="form-select" name="jabatan">
            <option value="Dosen" <?= $p['jabatan']=='Dosen'?'selected':'' ?>>Dosen</option>
            <option value="Staf TU" <?= $p['jabatan']=='Staf TU'?'selected':'' ?>>Staf TU</option>
            <option value="Mahasiswa" <?= $p['jabatan']=='Mahasiswa'?'selected':'' ?>>Mahasiswa</option>
        </select>
    </div>
</div>

<!-- ROW 4 -->
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label fw-bold">Role</label>
        <select class="form-select" name="role">
            <option value="Admin" <?= $p['role']=='Admin'?'selected':'' ?>>Admin</option>
            <option value="Peserta" <?= $p['role']=='Peserta'?'selected':'' ?>>Peserta</option>
        </select>
    </div>
</div>

