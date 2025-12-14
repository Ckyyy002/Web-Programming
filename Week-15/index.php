<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Siswa Kelas IX RPL</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; color: #0056b3; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ccc; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .cetak-btn { text-align: center; margin: 20px 0; }
        .cetak-btn a { padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>DAFTAR SISWA KELAS IX REKAYASA PERANGKAT LUNAK</h2>

    <div class="cetak-btn">
        <a href="cetak.php" target="_blank">
            Cetak PDF
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM siswa WHERE kelas = 'IX RPL' ORDER BY nis ASC";
            $result = $koneksi->query($query);
            $no = 1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nis']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data siswa.</td></tr>";
            }
            $koneksi->close();
            ?>
        </tbody>
    </table>
</body>
</html>
