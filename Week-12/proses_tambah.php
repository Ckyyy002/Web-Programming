<?php
include 'database.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jenis_kelamin'];
$telp = $_POST['no_telepon'];
$alamat = $_POST['alamat'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$path = "uploads/";

$fotobaru = time() . '_' . $foto;

if(move_uploaded_file($tmp, $path.$fotobaru)){
    $query = "INSERT INTO siswa (nis, nama, jenis_kelamin, no_telepon, alamat, foto) 
              VALUES ('$nis', '$nama', '$jk', '$telp', '$alamat', '$fotobaru')";
    
    if(mysqli_query($conn, $query)){
        header("Location: index.php");
    } else {
        echo "Gagal menyimpan database.";
    }
} else {
    echo "Gagal upload gambar.";
}
?>