<?php
$conn = new mysqli("localhost", "root", "", "infentori");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM barang WHERE id = $id";
    $result = $conn->query($sql);
    $barang = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $gambar = $_FILES['gambar']['name'];

    // Jika ada gambar baru, upload
    if ($gambar) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/" . $gambar);
        $sql = "UPDATE barang SET gambar='$gambar', nama_barang='$nama_barang', kategori='$kategori', harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok' WHERE id = $id";
    } else {
        // Jika gambar tidak diubah
        $sql = "UPDATE barang SET nama_barang='$nama_barang', kategori='$kategori', harga_jual='$harga_jual', harga_beli='$harga_beli', stok='$stok' WHERE id = $id";
    }

    $conn->query($sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Gambar:</label><br>
        <input type="file" name="gambar"><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?php echo $barang['nama_barang']; ?>" required><br>
        <label>Kategori:</label><br>
        <input type="text" name="kategori" value="<?php echo $barang['kategori']; ?>" required><br>
        <label>Harga Jual:</label><br>
        <input type="number" name="harga_jual" value="<?php echo $barang['harga_jual']; ?>" required><br>
        <label>Harga Beli:</label><br>
        <input type="number" name="harga_beli" value="<?php echo $barang['harga_beli']; ?>" required><br>
        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $barang['stok']; ?>" required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
