<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - Sistem Manajemen Rapat</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
  <style>
    .mb-2 {
      color: rgba(60, 130, 235, 1);
      position: relative;
      font-size: 15px;
    }
    .mb-2 input {
      border: 1px solid rgba(161, 164, 165, 1);
    }
    .btn {
      margin: 15px 0;
    }
    .mb-2 .ikon {
      position: absolute;
      top: 50px;
      right: 18px;
      transform: translateY(-50%);
      font-size: 18px;
      
    }
    .close {
      position: absolute;
      right:0;
      top:0;
      color: white;
      margin: 10px;
      width: 30px;
      height: 30px;
    }
  </style>
  <script src="https://unpkg.com/feather-icons"></script>
  </head>
    
  <body class="bg-light" style="background: linear-gradient(rgb(8, 124, 170), rgb(112, 255, 172))" >
    <div class="container min-vh-100 d-flex justify-content-center align-items-center" id="loginPage">
      <div class="card shadow-lg border-0 overflow-hidden" style="max-width: 850px; width: 100%" >
        <div class="row g-0">
          <!--Gambar Kanan-->
          <div class="col-12 col-md-6 order-1 order-md-2">
            <img src="https://www.polibatam.ac.id/wp-content/uploads/2023/05/Gedung-1536x1024.jpg"
              alt="Gedung Polibatam"
              class="img-fluid w-100 h-100"
              style="object-fit: cover; object-position: center"/>
          </div>
          <!--Menu Login Kiri-->
          <div class="col-12 col-md-6 d-flex justify-content-center align-items-center order-2 order-md-1 bg-white p-4">
            <div class="w-100" style="max-width: 350px">
              <a href="halaman_utama.php"><i class="close" data-feather="x"></i></a>
              <h2 class="text-center mb-1 fw-bold" style="color:rgba(60, 130, 235, 1);">Masuk</h2>
              <h5 class="text-center mb-3 fw-semibold">Sistem Manajemen Rapat</h5>
              <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
              <?php endif; ?>
              <form action="proses_login.php" method="POST">
                <div class="mb-2">
                  <label class="form-label">Nama Pengguna</label>
                  <input type="text" id="username" class="form-control" name="username" placeholder="Masukkan nama pengguna" required/>
                  <i class="ikon" data-feather="user"></i>
                </div>

                <div class="mb-2">
                  <label class="form-label">Kata Sandi</label>
                  <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan kata sandi" required/>
                  <i class="ikon" data-feather="lock"></i>
                </div>

                <button type="submit" class="btn btn-primary w-100"><i class="ikon" data-feather="log-in"></i>
                Masuk
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="login.js"></script>
  </body>
</html>
