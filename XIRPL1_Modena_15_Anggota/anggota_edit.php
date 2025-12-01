<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE anggota_id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama  = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $profil = $_POST['profil'];
    $status = $_POST['keanggota_status'];

    $query = mysqli_query($koneksi, "UPDATE anggota SET 
                nama='$nama', 
                alamat='$alamat', 
                email='$email', 
                profil='$profil', 
                keanggota_status='$status' 
            WHERE anggota_id='$id'");

    if ($query) {
        echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Anggota</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $row['alamat']; ?></textarea>

        <label>Email</label>
        <input type="email" name="email" value="<?= $row['email']; ?>" required>

        <label>Profil</label>
        <input type="text" name="profil" value="<?= $row['profil']; ?>" required>

        <label>Status Keanggotaan</label>
        <select name="keanggota_status" required>
            <option value="Aktif" <?= ($row['keanggota_status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
            <option value="Tidak aktif" <?= ($row['keanggota_status'] == 'Nonaktif') ? 'selected' : ''; ?>>Tidak aktif</option>
        </select>
        <button type="submit" name="update">Update</button>
    </form>
</div>
</body>
</html>