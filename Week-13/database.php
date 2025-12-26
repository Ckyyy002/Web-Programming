<?php
$host = "localhost";
$user = "admin";
$pass = "";
$db   = "info_siswa";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>