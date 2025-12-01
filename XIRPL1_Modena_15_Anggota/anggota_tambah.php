<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama  = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $profil = $_POST['profil'];
    $status = $_POST['keanggota_status'];

    $query = mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat, email, profil, keanggota_status)
                                    VALUES ('$nama', '$alamat', '$email', '$profil', '$status')");
    
    if ($query) {
        echo "<script>alert('Data anggota berhasil ditambahkan!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Tambah Data Anggota</h2>
    <form method="POST">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Profil</label>
        <input type="text" name="profil" required>

        <label>Status Keanggotaan</label>
        <select name="keanggota_status" required>
            <option value="">-- Pilih Status --</option>
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Tidak aktif</option>
        </select>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>
</body>
</html>