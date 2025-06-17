<?php include 'inc/header.php'; include 'db/config.php'; ?>

<style>
  .btn-primary {
    background-color: rgb(247, 238, 111) !important;
    color: #333 !important;
    border-color: rgb(155, 144, 0);
  }

  .btn-outline-primary {
    background-color: rgb(148, 84, 0);
    color: white;
  }

  .badge {
    display: inline-block;
    padding: 0.4em 0.75em;
    font-size: 0.85rem;
    font-weight: 500;
    border-radius: 0.5rem;
    background-color: #ffeb99;
    color: #333;
    text-decoration: none;
    transition: background-color 0.2s ease;
    margin-right: 5px;
  }

  .badge:hover {
    background-color: #ffe066;
    color: #000;
  }
</style>

<div class="container mt-4 mb-5">
<?php
$slug = $_GET['slug'];
$stmt = $conn->prepare("SELECT * FROM berita WHERE slug = ?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $berita = $result->fetch_assoc();
  echo "<a href='javascript:history.back()' class='btn btn-primary mb-4'>&laquo; Kembali</a>";
  echo "<h1 class='mb-3'>{$berita['judul']}</h1>";
  echo "<div class='text-muted mb-3 border-bottom pb-2'>
          <small>Dipublikasikan pada: " . date('d F Y, H:i', strtotime($berita['tanggal'])) . " WIB</small>
        </div>";

  echo "<img src='uploads/{$berita['gambar']}' class='img-fluid rounded shadow-sm mb-4' style='max-height: 500px; width: 100%; object-fit: cover;' alt='{$berita['judul']}'>";

  echo "<div class='article-content' style='font-size: 1.1rem; line-height: 1.8;'>
          ".nl2br($berita['isi'])."
        </div>";

  // Bagian tagar
  if (!empty($berita['tag'])) {
    echo "<div class='mt-4'>";
    echo "<strong>Tagar: </strong>";
    $tags = explode(',', $berita['tag']);
    foreach($tags as $t) {
      $t = trim($t);
      echo "<a href='tag.php?tag={$t}' class='badge'>#{$t}</a>";
    }
    echo "</div>";
  }

  // Navigasi berita sebelumnya & berikutnya
  $prev_stmt = $conn->prepare("SELECT slug FROM berita WHERE id < ? ORDER BY id DESC LIMIT 1");
  $prev_stmt->bind_param("i", $berita['id']);
  $prev_stmt->execute();
  $prev_result = $prev_stmt->get_result();
  $prev_berita = $prev_result->fetch_assoc();

  $next_stmt = $conn->prepare("SELECT slug FROM berita WHERE id > ? ORDER BY id ASC LIMIT 1");
  $next_stmt->bind_param("i", $berita['id']);
  $next_stmt->execute();
  $next_result = $next_stmt->get_result();
  $next_berita = $next_result->fetch_assoc();

  echo "<hr class='my-4'>";
  echo "<div class='d-flex justify-content-between mt-4'>";

  if ($prev_berita) {
    echo "<a href='detail.php?slug={$prev_berita['slug']}' class='btn btn-outline-primary'>&laquo; Berita Sebelumnya</a>";
  } else {
    echo "<div></div>";
  }

  if ($next_berita) {
    echo "<a href='detail.php?slug={$next_berita['slug']}' class='btn btn-primary'>Berita Berikutnya &raquo;</a>";
  }

  echo "</div>";

} else {
  echo "<div class='alert alert-danger text-center'>
          <h4 class='alert-heading'>404 - Tidak Ditemukan</h4>
          <p>Maaf, berita yang Anda cari tidak dapat ditemukan. Mungkin URL telah berubah atau berita telah dihapus.</p>
          <hr>
          <a href='index.php' class='btn btn-primary'>Kembali ke Beranda</a>
        </div>";
}

$stmt->close();
?>
</div>

<?php include 'inc/footer.php'; ?>
