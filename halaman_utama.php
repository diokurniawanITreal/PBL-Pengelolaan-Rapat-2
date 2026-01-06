<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejemen Rapat Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgba(179, 216, 255, 1);        
        }
        .navbar {
            background-color: rgba(51, 150, 68, 1);
        }
        .btn {
            color: rgba(0, 0, 0, 1);
            background-color: rgba(235, 126, 54, 1);
            border: 1px solid rgba(140, 142, 143, 1);
            text-align: center;
            padding: 5px 15px;
        }
        .btn:hover {
            background-color: rgba(235, 142, 3, 1);
            border: 1px solid rgba(55, 58, 58, 1);
            color: rgba(247, 247, 247, 1);
        }
        .rounded:hover {
            transform: scale(1.03);
            transition: 0.2s;
            cursor: pointer;
        }
        .card-img-overlay {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
        }
        .card-img-overlay {
            border-image: fill 0 linear-gradient(#0001, #000)
        }
        .tentang {
            display: flex;
            Justify-content: center;
            align-items: center;
            margin-bottom: 30px;
            
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
<nav class="navbar fixed-top bg-primary">
    <div class="container-fluid">
        <div class="logo">
        <img src="img/logo polbatam.png" alt="" width="85" height="40" style="border-radius: 8px; margin-left: 35px;">
        </div>
    </div>
</nav>

<!-- END NAVBAR -->

<div class="card text-bg-light" style="height: 632px">
    <img src="img/polibatam-tc.jpg" class="card-img" alt="..." style="height: 630px;">
    <div class="card-img-overlay">
        <br>
        <br>
        <br>
        <h1 class="card-title" style="font-size: 50px;">Selamat Datang di Manajemen Rapat</h1>
        <h2 class="card-title" style="color: rgba(1, 72, 165, 1); font-size: 40px;">Politeknik Negeri Batam</h2>
        <p class="card-text" style="color: rgba(255, 255, 255, 1)" ><small>Jl. Ahmad Yani Batam Kota, Teluk Tering, Kecamatan Batam Kota, Kepulauan Riau, Kode Pos: 29424.</small></p>
        <a href="menulogin.php" class="btn">Masuk Sekarang!</a>
    </div>
</div>

    <!-- ABOUT CONTENT -->
<div class="wrapper" style=" margin: 50px;">
    <div class="container py-10">
        <div class="row justify-content-center mb-2">
            <div class="col-lg-8 text-center">
                <h1 class="fw-bold mb-3">Apa Itu Web Manajemen Rapat?</h1>
                <p class="text-muted" style="color:black; font-weight:500; text-align: justify;">
                    Web Manajemen Rapat adalah platform digital yang membantu instansi, organisasi, dan tim kerja
                    dalam mengatur agenda, peserta, dan hasil rapat, serta dokumentasi secara terstruktur dan mudah diakses.
                    Dibuat untuk mengurangi proses administratif manual dan meningkatkan efisiensi kerja.
                </p>
            </div>
        </div>

        <!-- FITUR -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="shadow p-4 rounded text-center h-100" style="background-color: rgba(73, 187, 92, 1)">
                    <h5 class="fw-bold">📅 Manajemen Agenda</h5>
                    <p class="text-muted" style="color:black; font-weight:500;">Mengatur jadwal, lokasi, pimpinan rapat, dan detail lainnya dengan mudah.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="shadow p-4 rounded text-center h-100" style="background-color: rgba(207, 63, 63, 1)">
                    <h5 class="fw-bold">👥 Kelola Peserta</h5>
                    <p class="text-muted" style="color:black; font-weight:500;">Menambah peserta dari database pengguna menggunakan tag interaktif.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="shadow p-4 rounded text-center h-100" style="background-color: rgba(192, 206, 66, 1)">
                    <h5 class="fw-bold">📊 Dashboard Interaktif</h5>
                    <p class="text-muted" style="color:black; font-weight:500;">Menampilkan hasil dan rangkuman rapat secara real-time dan responsif.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- btn tentang -->
<div class="tentang">
    <p class="d-inline-flex gap-1">
    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Tim Pengembang PBL
    </a>
</p>
</div>

<!-- tampilan dari btn -->
<div class="collapse" id="collapseExample">
    <div class="card card-body" style="background-color: rgba(179, 216, 255, 1);">
        <!-- DEVELOPER SECTION -->
        <div class="container py-4" style="background-color: transparant; backdrop-filter: blur(5px);">
            <div class="row justify-content-center mb-2">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3" style="color: rgba(0, 0, 0, 1);">Tim Pengembang Web</h2>
                </div>
            </div>
            <!-- Profil-->
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="shadow p-2 rounded text-center h-100"  style="background-color: rgba(160, 178, 235, 1);">
                        <img src="img/dio.jpeg" class="developer-img shadow" alt="Foto Developer" width="180" height="170" style="border-radius:50%; margin: 10px;">
                        <h4 class="fw-bold">Dio Kurniawan</h4>
                        <h6 class="fw-bold">3312501097</h6>
                        <p class="text-muted">Halaman Utama, Isi Menu Data Rapat & Peserta.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="shadow p-2 rounded text-center h-100" style="background-color: rgba(202, 212, 245, 1);">
                        <img src="img/opsi.jpeg" class="developer-img shadow" alt="Foto Developer" width="180" height="170" style="border-radius:50%; margin: 10px;">
                        <h4 class="fw-bold">Opsi Adi Ramadhan</h4>
                        <h6 class="fw-bold">3312501096</h6>
                        <p class="text-muted">Menu Login & Tampilan Dashboard Peserta.</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="shadow p-2 rounded text-center h-100" style="background-color: rgba(160, 178, 235, 1);">
                        <img src="img/laura.jpeg" class="developer-img shadow" alt="Foto Developer" width="180" height="170" style="border-radius:50%; margin: 10px;">
                        <h4 class="fw-bold">Laura Cantika</h4>
                        <h6 class="fw-bold">3312501095</h6>
                        <p class="text-muted">Tampilan Dashboard Admin.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="shadow p-2 rounded text-center h-100" style="background-color: rgba(202, 212, 245, 1);">
                        <img src="img/fany.jpeg" class="developer-img shadow" alt="Foto Developer" width="180" height="170" style="border-radius:50%; margin: 10px;">
                        <h4 class="fw-bold">Fany Fazira</h4>
                        <h6 class="fw-bold">3312501094</h6>
                        <p class="text-muted">Menu Lihat Rapat Peserta.</p>
                    </div>
                </div>
                <p class="mx-auto" style="max-width: 700px; color: black; text-align:center;" >
                    Developer yang berfokus pada pembuatan aplikasi berbasis web, mulai dari frontend,
                    backend, pengelolaan database, hingga integrasi antarmuka interaktif menggunakan JavaScript.  
                    Web Manajemen Rapat ini dibuat untuk membantu instansi dalam mengelola dokumen rapat
                    secara lebih modern dan terstruktur.
                </p>
            </div>
        </div>
    </div>
</div>





<!-- FOOTER -->
    <footer class="text-center py-3 text-white" style="background-color: rgba(11, 50, 90, 1);" >
        <small>© PBL 2025 Web Manajemen Rapat – All Rights Reserved</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>