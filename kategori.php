<?php include 'inc/header.php'; include 'db/config.php'; ?>

<style>
.btn-blue {
  background-color: #1E88E5; 
  border-color: #1E88E5;
  color: white;
}
.btn-blue:hover {
  background-color: #1565C0; 
  border-color: #1565C0;
  color: white;
}

.text-blue-theme {
    color: #1E88E5; /* Warna link biru */
}
.card-img-cover {
  object-fit: cover;
  height: 100%;
  width: 100%;
}
</style>

<div class="container mt-4">
  <?php
  $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
  $stmt_kat = $conn->prepare("SELECT nama_kategori FROM kategori WHERE id = ?");
  $stmt_kat->bind_param("i", $id);
  $stmt_kat->execute();
  $result_kat = $stmt_kat->get_result();

  if ($result_kat->num_rows > 0) {
    $kategori = $result_kat->fetch_assoc();
    echo "<h2 class='pb-2 mb-4 border-bottom'>Berita Kategori: <span class='text-blue-theme'>" . htmlspecialchars($kategori['nama_kategori']) . "</span></h2>";

    $stmt_berita = $conn->prepare("SELECT judul, slug, gambar, tanggal, isi FROM berita WHERE id_kategori = ? ORDER BY tanggal DESC");
    $stmt_berita->bind_param("i", $id);
    $stmt_berita->execute();
    $result_berita = $stmt_berita->get_result();

    if ($result_berita->num_rows > 0) {
      while($b = $result_berita->fetch_assoc()) {
  ?>
        <div class="card mb-4 shadow-sm">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="uploads/<?php echo htmlspecialchars($b['gambar']); ?>" class="img-fluid rounded-start card-img-cover" alt="<?php echo htmlspecialchars($b['judul']); ?>">
            </div>
            <div class="col-md-8">
              <div class="card-body d-flex flex-column h-100">
                <h5 class="card-title">
                  <a href="detail.php?slug=<?php echo htmlspecialchars($b['slug']); ?>" class="text-decoration-none text-blue-theme"><?php echo htmlspecialchars($b['judul']); ?></a>
                </h5>
                <p class="card-text"><small class="text-muted">Diposting pada: <?php echo date('d F Y', strtotime($b['tanggal'])); ?></small></p>
                <p class="card-text mt-2"><?php echo substr(strip_tags($b['isi']), 0, 200); ?>...</p>
                <div class="mt-auto pt-2">
                   <a href="detail.php?slug=<?php echo htmlspecialchars($b['slug']); ?>" class="btn btn-blue btn-sm">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php
      } 
    } else {
      echo "<div class='alert alert-info'>Saat ini belum ada berita dalam kategori '" . htmlspecialchars($kategori['nama_kategori']) . "'.</div>";
    }
  } else {
    echo "<div class='alert alert-danger'>Kategori yang Anda cari tidak ditemukan.</div>";
  }
  ?>
</div>

<?php include 'inc/footer.php'; ?>
