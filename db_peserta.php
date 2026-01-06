<?php
session_start();

if ($_SESSION['role'] != "peserta") {
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style_db.css">
<script src="https://unpkg.com/feather-icons"></script>
<style>
.sidebar-peserta {
    width: 200px;
    height: 100vh;
    position: fixed;
    background: rgba(15, 55, 97, 1);
    color: white;
}
.menu-sidebar-peserta a {
    padding: 12px 20px;
    display: block;
    color: #ddd;
    text-decoration: none;
}
.menu-sidebar-peserta a:hover {
    background: rgba(145, 174, 202, 1);
    color: white;
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
.modal-content {
    border-radius: 20px;
    padding: 30px;
}
.info-login {
    color: white;
    padding-top: 15px;
    text-align: center;
  }
.ikon {
    width: 17px;
    height: 17px;
  }
</style>
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow" style="padding: 5px;">
    <div class="container-fluid">
        <div class="logo">
        <img src="img/logo polbatam.png" alt="" width="85" height="40" style="border-radius: 8px; margin-right: 10px;">
        <a class="navbar-brand fw-bold" href="#" style=" color:rgba(31,31,31, 1); font-size: 23px;">Manajemen Rapat</a>
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
<div class="sidebar-peserta" style="background: transparent; 
                            backdrop-filter: blur(8px); 
                            color: black; 
                            border-right: 1px solid grey;">
    <div class="info-login">
        <?php
        echo "<p>Hallo, " . $_SESSION['username'];
        ?>
        </div>
    <div class="menu-sidebar-peserta">
    <a href="#" class="menu" data-page="dashboard" style="color: black;"><i data-feather="calendar"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    <a href="#" class="menu" data-page="agenda" style="color: black;"><i data-feather="user"></i>&nbsp;&nbsp;&nbsp;&nbsp;Lihat Rapat</a>
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
      <p>Selamat datang Peserta, Berikut ringkasan kegiatan rapat anda sekarang!</p>
  
      <div class="row mt-4 gap-4 d-flex justify-content-center">
        <div class="col-md-5" >
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(14, 105, 224, 0.94);">
            <h5>Total Semua Rapat</h5>
            <h2 class="text-dark"><?= $totalRapat ?></h2>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(14, 157, 28, 0.94);">
            <h5>Total Rapat Selesai</h5>
            <h2 class="text-dark"><?= $totalSelesai ?></h2>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card card-hover shadow-sm p-3" style="background-color:rgba(179, 171, 54, 0.92);">
            <h5>Total Rapat Mendatang</h5>
            <h2 class="text-dark"><?= $totalPending ?></h2>
          </div>
        </div>
      </div> 
    </div>
    
    
     <!-- AGENDA RAPAT -->
     <?php
    include "koneksi.php";
    $data = mysqli_query($koneksi, "SELECT * FROM rapats");
    ?>
    <div id="agenda" class="page d-none">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Rapat</h3>
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

    fetch(`search_rapatp.php?search=${search}&tanggal=${tanggal}&status=${status}`)
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

    /* FITUR AKSI RAPAT : DETAIL */
    document.addEventListener("click", function(e){
    
      /* DETAIL */
      if(e.target.classList.contains("btn-viewrapat")){
        let id = e.target.dataset.id;
        fetch("rapatpeserta_detail.php?id="+id)
        .then(res => res.text())
        .then(data => {
          document.getElementById("detailRapat").innerHTML = data;
          new bootstrap.Modal(modalDetailRapat).show();
        });
      }
    });
    
  </script>

</body>
</html>
