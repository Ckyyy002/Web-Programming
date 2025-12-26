<?php 
session_start();
if($_SESSION['level'] != "admin"){
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin | NexCorp</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header-profile">
            <div class="profile-text">
                <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
                <p>Anda login sebagai Administrator sistem.</p>
            </div>
            <div>
                <span class="badge-role role-admin">ADMIN</span>
                <a href="logout.php" class="btn-logout" style="margin-left: 10px;">Logout</a>
            </div>
        </div>

        <div class="dashboard-grid">
            <a href="#" class="card-menu border-admin">
                <h3>Manajemen User</h3>
                <p>Tambah atau edit user</p>
                <span class="fas fa-users"></span>
            </a>
            <a href="#" class="card-menu border-admin">
                <h3>Laporan Keuangan</h3>
                <p>Lihat profit bulanan</p>
                <span class="fas fa-chart-line"></span>
            </a>
            <a href="#" class="card-menu border-admin">
                <h3>Pengaturan Sistem</h3>
                <p>Konfigurasi aplikasi</p>
                <span class="fas fa-cogs"></span>
            </a>
            <a href="#" class="card-menu border-admin">
                <h3>Log Aktivitas</h3>
                <p>Pantau kinerja sistem</p>
                <span class="fas fa-history"></span>
            </a>
        </div>
    </div>
</body>
</html>