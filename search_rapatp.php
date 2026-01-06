<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap 5.3.8 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <?php
    include "koneksi.php";
    date_default_timezone_set('Asia/Jakarta'); // wajib!
    $search  = $_GET['search'] ?? '';
    $tanggal = $_GET['tanggal'] ?? '';
    $status  = $_GET['status'] ?? '';
    $sekarang = date('Y-m-d H:i:s');
    
    $query = "SELECT * FROM rapats WHERE 1=1";
    
    // search agenda
    if($search != ''){
        $query .= " AND judul_rapat LIKE '%$search%'";
    }
    
    // filter tanggal
    if($tanggal != ''){
        $query .= " AND tanggal = '$tanggal'";
    }
    
    // filter status rapat
    if($status == 'sudah'){
        $query .= " AND CONCAT(tanggal,' ',waktu) < NOW()";
    }
    
    if($status == 'belum'){
        $query .= " AND CONCAT(tanggal,' ',waktu) >= NOW()";
    }
    
    $query .= " ORDER BY tanggal DESC, waktu DESC";
    
    $data = mysqli_query($koneksi, $query);
    $no = 1;

    while($r = mysqli_fetch_assoc($data)){
        $waktuRapat = $r['tanggal'] . ' ' . $r['waktu'];
        
        if ($sekarang >= $waktuRapat) {
            $status = "<span class='badge bg-success'>Sudah Terlaksana</span>";
        } else {
            $status = "<span class='badge bg-danger text-dark'>Belum Terlaksana</span>";
        }
        echo 
        
            "<tr>
            <td>{$no}</td>
            <td>{$r['judul_rapat']}</td>
            <td>{$r['tanggal']}</td>
            <td>{$r['waktu']}</td>
            <td>{$r['tempat']}</td>
            <td>{$r['pimpinan']}</td>
            <td>{$status}</td>
            <td>
                <button class='btn btn-success btn-sm btn-viewrapat'
                    data-id='{$r['id_rapat']}'>👁</button>
                    </td>

                </tr>"; 
                $no++;
            }
            ?>
               
           

    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

