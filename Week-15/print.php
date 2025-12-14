<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('fpdf.php'); 
include('connect.php'); 

$pdf = new FPDF(); 
$pdf->AddPage(); 
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1); 
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255); 
$pdf->Cell(10, 8, 'No', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'NIS', 1, 0, 'C', 1);
$pdf->Cell(70, 8, 'Nama Siswa', 1, 0, 'C', 1);
$pdf->Cell(40, 8, 'Jenis Kelamin', 1, 0, 'C', 1);
$pdf->Cell(40, 8, 'Kelas', 1, 1, 'C', 1);
$pdf->SetFont('Arial', '', 10);

$query = "SELECT * FROM siswa WHERE kelas = 'IX RPL' ORDER BY nis ASC";
$result = $koneksi->query($query);
$no = 1;

if (!$result) {
    die("Query error: " . $koneksi->error);
}

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 7, $no++, 1, 0, 'C');
    $pdf->Cell(30, 7, $row['nis'], 1, 0, 'C');
    $pdf->Cell(70, 7, $row['nama_siswa'], 1, 0, 'L'); 
    $pdf->Cell(40, 7, $row['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(40, 7, $row['kelas'], 1, 1, 'C'); 
}

$pdf->Output('I', 'DaftarSiswa_IX_RPL.pdf'); 
$koneksi->close();
?>
