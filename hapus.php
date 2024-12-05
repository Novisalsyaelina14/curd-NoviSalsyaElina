<?php
$conn = new mysqli("localhost", "root", "", "infentori");
$id = $_GET['id'];
$sql = "DELETE FROM barang WHERE id = $id";
$conn->query($sql);
header("Location: index.php");
?>
