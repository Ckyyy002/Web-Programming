<?php
$host = "localhost";
$user = "root";      
$pass = "";          
$db   = "informasi_siswa"; 

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi ke database GAGAL: " . $koneksi->connect_error);
}

$koneksi->set_charset("utf8");
?>
