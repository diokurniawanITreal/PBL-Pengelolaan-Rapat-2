<?php
include "koneksi.php";
$id = $_GET['id'];
$q = mysqli_query($koneksi,"SELECT * FROM rapats WHERE id_rapat='$id'");
$r = mysqli_fetch_assoc($q);
$peserta = mysqli_query($koneksi, "SELECT * FROM peserta");
?>

<input type="hidden" name="id_rapat" value="<?= $r['id_rapat'] ?>">

    <div class="row mb-3">
        <label class="col-sm-2 col-form-label fw-bold">Judul Rapat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="judul_rapat" placeholder="Masukkan Judul Rapat" value="<?= $r['judul_rapat'] ?>">
        </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label fw-bold">Tanggal</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="tanggal" value="<?= $r['tanggal'] ?>">
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label fw-bold">Waktu</label>
      <div class="col-sm-10">
        <input type="time" class="form-control" name="waktu" value="<?= $r['waktu'] ?>">
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-2 col-form- fw-bold">Tempat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="tempat" placeholder="Masukkan Tempat" value="<?= $r['tempat'] ?>">
      </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-2 col-form-label fw-bold">Pimpinan Rapat</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="pimpinan" placeholder="Masukan Pimpinan Rapat" value="<?= $r['pimpinan'] ?>">
      </div>
    </div>
    <fieldset class="row mb-3">
      <legend class="col-form-label col-sm-2 pt-0 fw-bold">Peserta</legend>
      <div class="col-sm-10">
         <div class="form-check">
            <?php while ($p = mysqli_fetch_assoc($peserta)) { ?>
                <input type="checkbox" name="peserta[]" 
                       value="<?= $p['username'] ?>">
                <?= $p['username'] ?><br>
            <?php } ?>
          </div>
        </div>
      </div>
    </fieldset>
    