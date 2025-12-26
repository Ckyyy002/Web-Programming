<?php 
session_start();
// Cek level user
if($_SESSION['level'] != "pengurus"){
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pengurus | NexCorp</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header-profile">
            <div class="profile-text">
                <h1>Selamat Pagi, <?php echo $_SESSION['username']; ?></h1>
                <p>Siap memonitor tim hari ini?</p>
            </div>
            <div>
                <span class="badge-role role-pengurus">PENGURUS</span>
                <a href="logout.php" class="btn-logout" style="margin-left: 10px;">Logout</a>
            </div>
        </div>

        <div class="dashboard-grid">
            <a href="#" class="card-menu border-pengurus">
                <h3>Validasi Absensi</h3>
                <p>Cek kehadiran pegawai</p>
                <span class="fas fa-check-double"></span>
            </a>
            <a href="#" class="card-menu border-pengurus">
                <h3>Monitoring Kinerja</h3>
                <p>Grafik produktivitas tim</p>
                <span class="fas fa-chart-pie"></span>
            </a>
            <a href="#" class="card-menu border-pengurus">
                <h3>Laporan Bulanan</h3>
                <p>Rekap data operasional</p>
                <span class="fas fa-book"></span>
            </a>
            <a href="#" class="card-menu border-pengurus">
                <h3>Inventaris Barang</h3>
                <p>Cek stok kantor</p>
                <span class="fas fa-boxes"></span>
            </a>
        </div>
    </div>
</body>
</html>