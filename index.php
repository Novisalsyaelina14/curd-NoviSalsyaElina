<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "infentori");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk mendapatkan semua data
$sql = "SELECT * FROM barang";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #4CAF50;  /* Warna hijau untuk background */
            color: white;  /* Warna teks putih */
            padding: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }
        .btn-edit {
            background-color: blue;
        }
        .btn-hapus {
            background-color: red;
        }
        .btn-tambah {
            background-color: green;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>
     <center><h1>Data Barang</h1></center>
    <center><a href="tambah.php" class="btn-tambah">Tambah Baru</a></center>
    <br>
    <table>
        <thead>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_barang']; ?>" width="100"></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['harga_jual']; ?></td>
                    <td><?php echo $row['harga_beli']; ?></td>
                    <td><?php echo $row['stok']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
