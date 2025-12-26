<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa Modern</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; }
        .avatar { width: 50px; height: 50px; object-fit: cover; border-radius: 50%; border: 2px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-primary">Data Siswa</h2>
        <a href="tambah.php" class="btn btn-primary shadow-sm px-4 rounded-pill">+ Tambah Siswa</a>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Siswa</th>
                        <th>NIS</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
                    while ($row = mysqli_fetch_assoc($query)) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="uploads/<?= $row['foto']; ?>" class="avatar me-3" alt="Foto">
                                <div>
                                    <div class="fw-bold"><?= $row['nama']; ?></div>
                                    <small class="text-muted"><?= $row['jenis_kelamin']; ?></small>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-secondary"><?= $row['nis']; ?></span></td>
                        <td><?= $row['no_telepon']; ?></td>
                        <td><?= $row['alamat']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning text-white rounded-pill px-3">Edit</a>
                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger rounded-pill px-3" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
