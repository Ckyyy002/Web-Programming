<?php 
session_start();
// Cek level user
if($_SESSION['level'] != "pegawai"){
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pegawai | NexCorp</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header-profile">
            <div class="profile-text">
                <h1>Halo, <?php echo $_SESSION['username']; ?>!</h1>
                <p>Semangat bekerja hari ini.</p>
            </div>
            <div>
                <span class="badge-role role-pegawai">PEGAWAI</span>
                <a href="logout.php" class="btn-logout" style="margin-left: 10px;">Logout</a>
            </div>
        </div>

        <div class="dashboard-grid">
            <a href="#" class="card-menu border-pegawai">
                <h3>Absensi Masuk</h3>
                <p>Catat kehadiran hari ini</p>
                <span class="fas fa-fingerprint"></span>
            </a>
            <a href="#" class="card-menu border-pegawai">
                <h3>Tugas Saya</h3>
                <p>Daftar to-do list harian</p>
                <span class="fas fa-tasks"></span>
            </a>
            <a href="#" class="card-menu border-pegawai">
                <h3>Slip Gaji</h3>
                <p>Lihat rincian gaji</p>
                <span class="fas fa-file-invoice-dollar"></span>
            </a>
            <a href="#" class="card-menu border-pegawai">
                <h3>Pengajuan Cuti</h3>
                <p>Form izin tidak masuk</p>
                <span class="fas fa-calendar-minus"></span>
            </a>
        </div>
    </div>
</body>
</html>