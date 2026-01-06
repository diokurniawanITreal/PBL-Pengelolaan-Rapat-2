<?php
session_start();

if ($_SESSION['role'] != "admin") {
    header("Location: menulogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Rapat</title>

  <!-- Bootstrap 5.3.8 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style_db.css">
  
  <style>
    .sidebar {
    width: 200px;
    height: 100vh;
    position: fixed;
    background: rgba(15, 55, 97, 1);
    color: white;
    padding-top: 20px;
    top: 0;
  }
    .header1 {
    display: flex;
    Justify-content: space-between;
    font-size: 22px;
    font-weight: 700;
    padding-bottom: 10px;
    border-bottom: 3px solid #25962bff;
    margin-bottom: 25px;
  }
  .modal-content {
    border-radius: 20px;
    padding: 30px;
  }
  .profile-card {
    border-radius: 20px;
    overflow: hidden;
  }
  .profile-left {
    background: linear-gradient(rgb(8, 124, 170), rgb(112, 255, 172));
    color: white;
  }
  .profile-img {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    border: 3px solid #fff;
    object-fit: cover;
  }
  
  .info-login {
    padding-top: 10px;
    color: white;
  }
  .ikon {
    width: 17px;
    height: 17px;
  }
  input:placeholder {
    color: white;
  }
  </style>

  <script src="https://unpkg.com/feather-icons"></script>

</head>

<body>
<!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow " style="padding: 5px; margin-left: 200px;">
    <div class="container-fluid" style="display:flex; Justify-content: space-between;">
      <div class="info-login">
      <?php echo "<p>Hallo, " . $_SESSION['username']; ?>
      </div>
      <div class="btn-group dropstart">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: rgba(20, 75, 133, 1); color : white;">
          <i class="icon" data-feather="user"></i>
        </button>
        <ul class="dropdown-menu">
          <li>
              <table class="table table-borderless mt-3">
                  <tr>
                    <th>Akun</th>
                    <td>
                        <span>:</span><?php echo " " . $_SESSION['username'];?>
                    </td>
                  </tr>
                  <tr>
                    <th>Role</th>
                    <td>
                        <span>:</span><?php echo " " . $_SESSION['role'];?>
                    </td>
                  </tr>
                  </table>
          </li>
          <li>
            <div class="out" style="padding: 5px; border-radius: 5px;">
              <a href="logout.php" style="color: white; text-decoration: none;"><i data-feather="log-out"></i>&nbsp;&nbsp;&nbsp;Keluar</a>
            </div>
          </li>
        </ul>
      </div>
  </nav>
<!-- END NAVBAR -->

  <!-- SIDEBAR -->
  <div class="sidebar">
    <div class="menu-sidebar">
    <div style="text-align: center;">
    <img src="img/logo polbatam.png" alt="" width="85" height="40" style="border-radius: 8px; margin-bottom: 5px;">
    <h5 class="text-center" style="color: rgba(255, 255, 255, 1);">Pengelolaan Rapat</h5>
    </div>
    <hr style="border-color: rgba(255,255,255,.3);">
    <a href="#" class="menu" data-page="dashboard"><i class="icon" data-feather="bar-chart-2"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    <a href="#" class="menu" data-page="agenda"><i class="icon" data-feather="calendar"></i>&nbsp;&nbsp;&nbsp;&nbsp;Data Rapat</a>
    <a href="#" class="menu" data-page="pengguna"><i class="icon" data-feather="users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Data Peserta</a>
    </div>
  </div>

  <!-- CONTENT -->
  <div id="content">

    <!-- DASHBOARD -->
    <div id="dashboard" class="page">
      <?php
      include "koneksi.php";
      
      // total rapat
      $totalRapat = mysqli_fetch_assoc(
          mysqli_query($koneksi, "SELECT COUNT(*) total FROM rapats")
      )['total'];
      
      // total peserta
      $totalPeserta = mysqli_fetch_assoc(
          mysqli_query($koneksi, "SELECT COUNT(*) total FROM peserta")
      )['total'];
      
      // rapat terlaksana
      $totalSelesai = mysqli_fetch_assoc(
          mysqli_query($koneksi,
              "SELECT COUNT(*) total FROM rapats WHERE tanggal < CURDATE()")
      )['total'];
      
      // rapat belum terlaksana
      $totalPending = mysqli_fetch_assoc(
          mysqli_query($koneksi,
              "SELECT COUNT(*) total FROM rapats WHERE tanggal >= CURDATE()")
      )['total'];
      
      // hitung persentase
      $selesaiPercent = ($totalRapat > 0) ? ($totalSelesai / $totalRapat) * 100 : 0;
      $pendingPercent = ($totalRapat > 0) ? ($totalPending / $totalRapat) * 100 : 0;
      ?>

      <h2>Dashboard Manajemen Rapat</h2>
      <p>Selamat datang Admin, Berikut ringkasan kegiatan rapat anda sekarang!</p>
  
      <div class="row mt-4 gap-4 d-flex justify-content-center">
        <div class="col-md-5" >
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(14, 105, 224, 0.94);">
            <h5>Total Semua Rapat</h5>
            <h2 class="text-dark"><?= $totalRapat ?></h2>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(179, 171, 54, 0.92);">
            <h5>Total Pengguna/Peserta Rapat</h5>
            <h2 class="text-dark"><?= $totalPeserta ?></h2>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(14, 157, 28, 0.94);">
            <h5>Total Rapat Selesai</h5>
            <h2 class="text-dark"><?= $totalSelesai ?></h2>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(154, 27, 23, 0.92);">
            <h5>Total Rapat Mendatang</h5>
            <h2 class="text-dark"><?= $totalPending ?></h2>
          </div>
        </div>
      </div>
    </div>

    <!-- DATA RAPAT -->
    <?php
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM rapats");
    ?>
    <div id="agenda" class="page d-none">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark">Data Rapat</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalRapat">+ Tambah Rapat</button>
      </div>
      <div class="d-flex justify-content-between align-items-center row mb-3 g-2" >
          <div class="col-md-4">
              <input type="text" id="searchRapat" class="form-control" placeholder="Cari agenda rapat" style="background-color: rgba(116, 114, 114, 0.98); color: white;">
          </div>

          <div class="col-md-3">
              <input type="date" id="filterTanggal" class="form-control" style="background-color: rgba(116, 114, 114, 0.98); color: white;">
          </div>

          <div class="col-md-3">
              <select id="filterStatus" class="form-select" style="background-color: rgba(116, 114, 114, 0.98); color: white;">
                  <option value="">Semua Status</option>
                  <option value="sudah">Sudah Terlaksana</option>
                  <option value="belum">Belum Terlaksana</option>
              </select>
          </div>
      </div>

      <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Agenda Rapat</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Tempat</th>
            <th>Pimpinan Rapat</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="dataRapat"></tbody>
      </table>
      </div>
    </div>

    <!-- MODAL DETAIL RAPAT -->
    <div class="modal fade" id="modalDetailRapat">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5>Detail Rapat</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body" id="detailRapat">
            Loading...
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDIT RAPAT -->
    <div class="modal fade" id="modalEditRapat">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: rgba(148, 205, 245, 1);">
          <div class="container py-3">
          <form id="formEditRapat">
            <div class="header1" style="border-bottom: 3px solid #2f9affff;">
              <div class="title-bar">Edit Jadwal Rapat</div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editRapat">
              Loading...
            </div>
            <div class="modal-footer mt-4" style=" display:flex; Justify-content: center; width: 100%;">  
              <button class="btn btn-primary"  style="width: 100%;">Simpan Data</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- DATA PESERTA -->
     <?php
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM peserta");
    ?>
      
    <div id="pengguna" class="page d-none" >
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-dark">Data Peserta</h3>
        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalPengguna">+ Tambah Peserta/Pengguna</button>
      </div>
      <div class="d-flex justify-content-between align-items-center row mb-3 g-2" >
          <div class="col-md-4">
              <input type="text" id="searchNama" class="form-control" placeholder="Cari Peserta Rapat" style="background-color: rgba(116, 114, 114, 0.98);">
          </div>

          <div class="col-md-3">
              <input type="text" id="searchNik" class="form-control" placeholder="Cari NIK/NIM" style="background-color: rgba(116, 114, 114, 0.98); color: white;">
          </div>

          <div class="col-md-3">
              <select id="filterJabatan" class="form-select" style="background-color: rgba(116, 114, 114, 0.98); color: white;">
                  <option value="">Semua Jabatan/Status</option>
                  <option value="Dosen">Dosen</option>
                  <option value="Staf TU">Staf TU</option>
                  <option value="Mahasiswa">Mahasiswa</option>
              </select>
          </div>
      </div>
      <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-warning">
            <tr>
              <th>No</th>
              <th>Nama Peserta</th>
              <th>Nik/Nim</th>
              <th>Email</th>
              <th>No. HP</th>
              <th>Jabatan</th>
              <th>Password</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataPeserta"></tbody>
      </table>
      </div> 
    </div>

    <!-- MODAL DETAIL PESERTA-->
    <div class="modal fade" id="modalDetailPeserta">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5>Detail Peserta</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body" id="detailPeserta">
            Loading...
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL EDIT PESERTA -->
    <div class="modal fade" id="modalEditPeserta">
      <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: rgba(234, 237, 212, 1);">
          <div class="container py-3">
          <form id="formEditPeserta">
            <div class="header1" style="border-bottom: 3px solid #ecaa1bff;">
               <div class="title-bar">Edit Data Pengguna/Peserta</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="editPeserta">
              Loading...
            </div>
            <div class="modal-footer mt-4" style=" display:flex; Justify-content: center; width: 100%;">  
              <button class="btn btn-warning"  style="width: 100%;">Simpan Data</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>  
  </div>

                
       <!-- Modal Tambah Rapat -->
    <?php
    include "koneksi.php";
    $peserta = mysqli_query($koneksi, "SELECT * FROM peserta");
    ?>
    <div class="modal fade" id="modalRapat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: rgba(148, 205, 245, 1);">
          <div class="container py-3">
            <div class="header1" style="border-bottom: 3px solid #2f9affff;">
              <div class="title-bar">Tambah Agenda Rapat</div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="simpan_rapat.php" method="POST">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Judul Rapat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul_rapat" placeholder="Masukkan Judul Rapat">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Waktu</label>
                <div class="col-sm-10">
                  <input type="time" class="form-control" name="waktu">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form- fw-bold">Tempat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat" placeholder="Masukkan Tempat">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label fw-bold">Pimpinan Rapat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pimpinan" placeholder="Masukan Pimpinan Rapat">
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
              </fieldset>
              <div class="mt-4" style=" display:flex; Justify-content: center; width: 100%;">  
              <button type="submit" class="btn btn-primary"  style="width: 100%;">Simpan Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
        <!-- Modal Tambah Peserta -->
    <?php
    include "koneksi.php";
    $peserta = mysqli_query($koneksi, "SELECT * FROM peserta");
    ?>
      <div class="modal fade" id="modalPengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" style="background-color: rgba(234, 237, 212, 1);">
            <div class="container py-3">
                <div class="header1" style="border-bottom: 3px solid #ecaa1bff;">
                  <div class="title-bar">Tambah Peserta</div>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              <form action="simpan_peserta.php" method="POST">
                <!-- ROW HORIZONTAL (MELEBAR KE SAMPING) -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Nama Peserta/pengguna</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan nama peserta/pengguna">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Nik/Nim</label>
                    <input type="number" name="nik_nim" class="form-control" placeholder="Masukkan no handphone">
                  </div>
                </div>
                <!-- ROW 2 -->
                <div class="row mb-3"> 
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Masukkan nama peserta">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-bold">No Handphone</label>
                    <input type="number" name="no_hp" class="form-control" placeholder="Masukkan no handphone">
                  </div>
                </div>
                <!-- ROW 3 -->
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email">
                  </div>               
                  <div class="col-md-6">
                    <label class="form-label fw-bold">Jabatan/Status</label>
                    <select class="form-select" name="jabatan">
                      <option selected>Pilih jabatan/status</option>
                      <option>Dosen</option>
                      <option>Staf TU</option>
                      <option>Mahasiswa</option>
                    </select>
                  </div> 
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Role</label>
                    <select class="form-select" name="role">
                      <option selected>Pilih Role</option>
                      <option>Admin</option>
                      <option>Peserta</option>
                    </select>
                  </div>
                <!-- BUTTON -->
                <div class="mt-4" style="display:flex; Justify-content: center;">
                    <button class="btn btn-warning px-4" style="width:100%;">Simpan Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <script>
    feather.replace();
  </script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <!-- INTERAKTIF JS -->
  <script>
    const menuItems = document.querySelectorAll(".menu");
    const pages = document.querySelectorAll(".page");

    menuItems.forEach(item => {
      item.addEventListener("click", function(e) {
        e.preventDefault();

        menuItems.forEach(m => m.classList.remove("active"));
        this.classList.add("active");

        let page = this.dataset.page;

        pages.forEach(p => p.classList.add("d-none"));
        document.getElementById(page).classList.remove("d-none");
      });
    });

    // proses search & filter RAPAT
    function loadData(){
    let search  = document.getElementById("searchRapat").value;
    let tanggal = document.getElementById("filterTanggal").value;
    let status  = document.getElementById("filterStatus").value;

    fetch(`search_rapat.php?search=${search}&tanggal=${tanggal}&status=${status}`)
        .then(res => res.text())
        .then(data => {
            document.getElementById("dataRapat").innerHTML = data;
        });
    }

    // load awal
    loadData();

    // realtime trigger
    document.getElementById("searchRapat").onkeyup = loadData;
    document.getElementById("filterTanggal").onchange = loadData;
    document.getElementById("filterStatus").onchange = loadData;

    // proses search & filter PESERTA

      
    function loadPeserta() {
        let nama = document.getElementById("searchNama").value;
        let nik = document.getElementById("searchNik").value;
        let jabatan = document.getElementById("filterJabatan").value;
    
        fetch("search_peserta.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "nama=" + nama + "&nik=" + nik + "&jabatan=" + jabatan
        })
        .then(res => res.text())
        .then(data => {
            document.getElementById("dataPeserta").innerHTML = data;
        });
    }
    
    document.getElementById("searchNama").addEventListener("keyup", loadPeserta);
    document.getElementById("searchNik").addEventListener("keyup", loadPeserta);
    document.getElementById("filterJabatan").addEventListener("change", loadPeserta);
    
    // load pertama
    loadPeserta();

    /* FITUR AKSI RAPAT : DETAIL, EDIT, DELETE, UPDATE */
    document.addEventListener("click", function(e){
    
      /* DETAIL */
      if(e.target.classList.contains("btn-viewrapat")){
        let id = e.target.dataset.id;
        fetch("rapat_detail.php?id="+id)
        .then(res => res.text())
        .then(data => {
          document.getElementById("detailRapat").innerHTML = data;
          new bootstrap.Modal(modalDetailRapat).show();
        });
      }
    
      /* EDIT */
      if(e.target.classList.contains("btn-editrapat")){
        let id = e.target.dataset.id;
        fetch("rapat_edit.php?id="+id)
        .then(res => res.text())
        .then(data => {
          document.getElementById("editRapat").innerHTML = data;
          new bootstrap.Modal(modalEditRapat).show();
        });
      }
    
      /* DELETE */
      if(e.target.classList.contains("btn-deleterapat")){
        if(confirm("Yakin hapus rapat ini?")){
          let id = e.target.dataset.id;
          fetch("rapat_delete.php", {
            method: "POST",
            headers: {"Content-Type":"application/x-www-form-urlencoded"},
            body: "id="+id
          }).then(() => location.reload());
        }
      }
    });

    /* SUBMIT EDIT */
    document.getElementById("formEditRapat").addEventListener("submit", function(e){
      e.preventDefault();
      fetch("rapat_update.php", {
        method: "POST",
        body: new FormData(this)
      }).then(() => {
        bootstrap.Modal.getInstance(modalEditRapat).hide();
        location.reload();
      });
    });

    /* FITUR AKSI PESERTA : DETAIL, EDIT, DELETE, UPDATE  */
    document.addEventListener("click", function(e){
    
      /* DETAIL */
      if(e.target.classList.contains("btn-viewpeserta")){
        let id = e.target.dataset.id;
        fetch("peserta_detail.php?id="+id)
        .then(res => res.text())
        .then(data => {
          document.getElementById("detailPeserta").innerHTML = data;
          new bootstrap.Modal(modalDetailPeserta).show();
        });
      }
    
      /* EDIT */
      if(e.target.classList.contains("btn-editpeserta")){
        let id = e.target.dataset.id;
        fetch("peserta_edit.php?id="+id)
        .then(res => res.text())
        .then(data => {
          document.getElementById("editPeserta").innerHTML = data;
          new bootstrap.Modal(modalEditPeserta).show();
        });
      }
    
      /* DELETE */
      if(e.target.classList.contains("btn-deletepeserta")){
        if(confirm("Yakin hapus peserta ini?")){
          let id = e.target.dataset.id;
          fetch("peserta_delete.php", {
            method: "POST",
            headers: {"Content-Type":"application/x-www-form-urlencoded"},
            body: "id="+id
          }).then(() => location.reload());
        }
      }
    });

    /* SUBMIT EDIT */
    document.getElementById("formEditPeserta").addEventListener("submit", function(e){
      e.preventDefault();
      fetch("peserta_update.php", {
        method: "POST",
        body: new FormData(this)
      }).then(() => {
        bootstrap.Modal.getInstance(modalEditPeserta).hide();
        location.reload();
      });
    });
    
  </script>

</body>
</html>
