<?php
include 'database.php';
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT foto FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
unlink("uploads/" . $row['foto']);

$query = "DELETE FROM siswa WHERE id='$id'";
if(mysqli_query($conn, $query)){
    header("Location: index.php");
} else {
    echo "Gagal menghapus.";
}
?>