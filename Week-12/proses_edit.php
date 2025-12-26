<?php
include 'database.php';

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jenis_kelamin'];
$telp = $_POST['no_telepon'];
$alamat = $_POST['alamat'];
$foto_lama = $_POST['foto_lama'];

if($_FILES['foto']['name'] != "") {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotobaru = time() . '_' . $foto;
    move_uploaded_file($tmp, "uploads/" . $fotobaru);
} else {
    $fotobaru = $foto_lama;
}

$query = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jk', no_telepon='$telp', alamat='$alamat', foto='$fotobaru' WHERE id='$id'";

if(mysqli_query($conn, $query)){
    header("Location: index.php");
} else {
    echo "Gagal update data.";
}
?>