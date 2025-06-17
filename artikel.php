<?php 
include 'inc/header.php'; 
include 'db/config.php'; 

// Pagination
$batas = 6;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

// Ambil data artikel + kategori
$query = $conn->query("SELECT berita.*, kategori.nama_kategori 
                       FROM berita 
                       JOIN kategori ON berita.id_kategori = kategori.id 
                       ORDER BY tanggal DESC 
                       LIMIT $mulai, $batas");

$total = $conn->query("SELECT COUNT(*) as total FROM berita")->fetch_assoc()['total'];
$pages = ceil($total / $batas);
?>

<style>
    .btn-outline-primary {
      background-color:rgb(247, 238, 111) !important; 
      color: #333 !important; 
      border-color: rgb(155, 144, 0);
    }
    .btn-outline-primary:hover {
      background-color:rgb(247, 238, 111) !important; 
      color: #333 !important; 
      border-color: rgb(155, 144, 0);
    }
    .pagination .page-link {
        color:rgb(247, 238, 111);
    }
    .pagination .page-link:hover {
        background-color:rgb(0, 0, 0);
        color: white;
    }
    .pagination .page-item.active .page-link {
        background-color:rgb(247, 238, 111);
        border-color: #B7950B;
        color: black;
}
</style>
<div class="container mt-4 mb-5">
  <h3 class="mb-4 fw-bold">📰 Semua Artikel</h3>
  <div class="row">
    <?php while ($data = $query->fetch_assoc()) : ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="uploads/<?= $data['gambar'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <div class="mb-2">
              <span class="badge bg-warning text-dark me-1"><?= date('d M Y', strtotime($data['tanggal'])) ?></span>
              <span class="badge bg-success"><?= $data['nama_kategori'] ?></span>
            </div>
            <h5 class="card-title"><?= $data['judul'] ?></h5>
            <p class="card-text text-muted"><?= substr(strip_tags($data['isi']), 0, 80) ?>...</p>
            <a href="detail.php?slug=<?= $data['slug'] ?>" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Pagination -->
  <nav>
    <ul class="pagination justify-content-center">
      <?php for ($i = 1; $i <= $pages; $i++) : ?>
        <li class="page-item <?= ($i == $halaman) ? 'active' : '' ?>">
          <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
        </li>
      <?php endfor; ?>
    </ul>
  </nav>
</div>

<?php include 'inc/footer.php'; ?>
