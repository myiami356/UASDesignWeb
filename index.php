<?php include 'inc/header.php'; include 'db/config.php'; ?>

<style>
.card-header.tema-biru {
  background-color:rgb(247, 238, 111); /* kuning pastel */
  color: #333; /* teks jadi lebih gelap agar kontras */
}

.card-body h5 a {
  color:rgb(148, 84, 0); /* kuning cerah */
  text-decoration: none;
}
.card-body h5 a:hover {
  color:rgb(255, 136, 0); /* kuning lebih gelap saat hover */
}

.kategori .list-group-item {
  color:rgb(148, 84, 0);
}
.kategori .list-group-item:hover {
  background-color: #FEF9E7;
  color: #B7950B;
}

.hot-news-link a {
  color: rgb(148, 84, 0) !important;
  text-decoration: none;
}
.hot-news-link a:hover {
  color: rgb(148, 84, 0) !important;
}

.tagar a {
  margin: 3px 5px 3px 0;
  display: inline-block;
  background-color:rgb(253, 245, 127); /* kuning pastel muda */
  padding: 4px 10px;
  border-radius: 20px;
  color:rgb(148, 84, 0);
  text-decoration: none;
  font-size: 13px;
}
.tagar a:hover {
  background-color: rgb(148, 84, 0);
  color: white;
}

.pagination .page-link {
  color:rgb(172, 164, 59);
  border-color: #B7950B;
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
.bg-secondary {
  background-color:rgb(247, 238, 111) !important; /* kuning pastel muda */
  color: #333 !important; /* teks biar tetap kebaca */
}
.card {
  margin-bottom: 20px;
}
</style>

<div class="container mt-4">
  <div class="row">
    <!-- Kategori -->
    <div class="col-md-3">
      <div class="card kategori mb-3">
        <div class="card-header fw-bold tema-biru">Kategori</div>
        <ul class="list-group list-group-flush">
          <?php
          $kategori = $conn->query("SELECT * FROM kategori");
          while($kat = $kategori->fetch_assoc()) {
            echo "<a href='kategori.php?id={$kat['id']}' class='list-group-item'>{$kat['nama_kategori']}</a>";
          }
          ?>
        </ul>
      </div>
    </div>

    <!-- Berita -->
    <div class="col-md-6">
      <?php
      $batas = 7;
      $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
      $mulai = ($hal - 1) * $batas;

      $berita = $conn->query("SELECT b.*, k.nama_kategori FROM berita b LEFT JOIN kategori k ON b.id_kategori = k.id ORDER BY b.tanggal DESC LIMIT $mulai, $batas");
      while($b = $berita->fetch_assoc()) {
        echo "<div class='card mb-4'>
                <div class='row g-0'>
                  <div class='col-md-4'>
                    <img src='uploads/{$b['gambar']}' class='img-fluid rounded-start' style='height: 100%; object-fit: cover;'>
                  </div>
                  <div class='col-md-8'>
                    <div class='card-body'>
                      <span class='badge bg-secondary mb-1'>{$b['nama_kategori']}</span>
                      <h5><a href='detail.php?slug={$b['slug']}'>{$b['judul']}</a></h5>
                      <small class='text-muted'>Dipublikasikan: {$b['tanggal']}</small>
                      <p class='mt-2 mb-0'>".substr(strip_tags($b['isi']),0,150)."...</p>
                    </div>
                  </div>
                </div>
              </div>";
      }

      $total = $conn->query("SELECT COUNT(*) as total FROM berita")->fetch_assoc()['total'];
      $pages = ceil($total / $batas);
      echo "<nav><ul class='pagination'>";
      for($i=1;$i<=$pages;$i++){
        $activeClass = ($i == $hal) ? 'active' : '';
        echo "<li class='page-item $activeClass'><a class='page-link' href='?hal=$i'>$i</a></li>";
      }
      echo "</ul></nav>";
      ?>
    </div>

    <!-- Hot News + Tagar -->
    <div class="col-md-3">
      <!-- Hot News -->
      <div class="card mb-3">
        <div class="card-header fw-bold tema-biru">Hot News 🔥</div>
        <ul class="list-group list-group-flush">
        <?php
        $hot = $conn->query("SELECT * FROM berita ORDER BY tanggal DESC LIMIT 5");
        while($h = $hot->fetch_assoc()) {
          echo "<li class='list-group-item'>
                  <div class='d-flex'>
                    <img src='uploads/{$h['gambar']}' width='60' height='40' class='me-2 rounded'>
                    <div class='hot-news-link'>
                      <a href='detail.php?slug={$h['slug']}' class='fw-semibold d-block'>{$h['judul']}</a>
                      <small class='text-muted'>{$h['tanggal']}</small>
                    </div>
                  </div>
                </li>";
        }
        ?>
        </ul>
      </div>

      <!-- Tagar -->
      <div class="card">
        <div class="card-header fw-bold tema-biru">Tagar</div>
        <div class="card-body tagar">
          <?php
          $tagar = $conn->query("SELECT tag FROM berita GROUP BY tag ORDER BY MAX(id) DESC");
          while($t = $tagar->fetch_assoc()) {
            echo "<a href='tag.php?tag={$t['tag']}'>#{$t['tag']}</a>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
