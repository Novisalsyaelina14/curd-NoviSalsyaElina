<?php
$conn = new mysqli("localhost", "root", "", "infentori");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $gambar = $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambar);
    $sql = "INSERT INTO barang (gambar, nama_barang, kategori, harga_jual, harga_beli, stok) VALUES ('$gambar', '$nama_barang', '$kategori', '$harga_jual', '$harga_beli', '$stok')";
    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang Baru</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Gambar:</label><br>
        <input type="file" name="gambar" required><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori" required><br>
        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" required><br>
        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" required><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" required><br><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
