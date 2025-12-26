<?php
include 'database.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0 pt-4">
                    <h4 class="fw-bold">Edit Data Siswa</h4>
                </div>
                <div class="card-body p-4">
                    <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <input type="hidden" name="foto_lama" value="<?= $row['foto']; ?>">

                        <div class="mb-3">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" value="<?= $row['nis']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $row['nama']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="Laki-laki" <?= ($row['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" value="<?= $row['no_telepon']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?= $row['alamat']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Foto Saat Ini</label><br>
                            <img src="uploads/<?= $row['foto']; ?>" width="80" class="rounded mb-2">
                            <input type="file" name="foto" class="form-control">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Update Data</button>
                            <a href="index.php" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>