<?php
include '../db/config.php';
$nama = $_POST['nama_kategori'];
$conn->query("INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
header("Location: dashboard.php");
?>