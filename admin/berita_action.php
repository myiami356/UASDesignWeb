<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db/config.php';
include '../function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = trim($_POST['judul']);
  $isi = trim($_POST['isi']);
  $id_kategori = (int)$_POST['id_kategori'];
  $tanggal = $_POST['tanggal'];
  $slug = slugify($judul);

  // 💡 Bersihkan tag dari spasi ekstra
  $input_tagar = explode(',', $_POST['tag']);
  $tag_bersih = [];

  foreach ($input_tagar as $t) {
    $tag_bersih[] = trim($t);
  }

  $tagar = implode(',', $tag_bersih); // contoh: politik,ekonomi,sosial

  if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $gambar = basename($_FILES['gambar']['name']);
    $tmp = $_FILES['gambar']['tmp_name'];
    $target = "../uploads/" . $gambar;

    if (move_uploaded_file($tmp, $target)) {
      $stmt = $conn->prepare("INSERT INTO berita (judul, isi, id_kategori, tanggal, gambar, slug, tag) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssissss", $judul, $isi, $id_kategori, $tanggal, $gambar, $slug, $tagar);

      if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
      } else {
        echo "Gagal menyimpan ke database: " . $stmt->error;
      }
    } else {
      echo "Upload gambar gagal.";
    }
  } else {
    echo "Gambar tidak valid: " . $_FILES['gambar']['error'];
  }
} else {
  echo "Akses tidak valid.";
}
?>
