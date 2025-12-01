<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffdff1ff;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #a06a98ff;
            color: white;
            padding: 15px 30px;
            font-size: 20px;
        }
        .container {
            width: 85%;
            margin: 40px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 25px;
        }
        h2 {
            margin-bottom: 15px;
            color: #2c3e50;
        }
        a.tambah-btn {
            background-color: #a06a98ff;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #a06a98ff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f7cde2ff;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
        .btn-edit {
            background-color: #a06a98ff;
        }
        .btn-hapus {
            background-color: #a7537dff;
        }
        .btn-edit:hover {
            background-color: #a06a98ff;
        }
        .btn-hapus:hover {
            background-color: #a7537dff;
        }
    </style>
</head>
<body>

<div class="navbar">
    Laudry
</div>

<div class="container">
    <h2>Data Anggota</h2>
    <a href="anggota_tambah.php" class="tambah-btn">Tambah Anggota Baru</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Profil</th>
            <th>Status Keanggotaan</th>
            <th>Opsi</th>
        </tr>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM anggota");
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['profil']; ?></td>
            <td><?php echo $row['keanggota_status']; ?></td>
            <td>
                <a href="anggota_edit.php?id=<?php echo $row['anggota_id']; ?>" class="btn btn-edit">Edit</a>
                <a href="anggota_hapus.php?id=<?php echo $row['anggota_id']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin mau hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php 
        } 
        ?>
    </table>
</div>
</body>
</html>