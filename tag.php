<?php include 'inc/header.php'; include 'db/config.php'; ?>

<style>
  .card-body a {
    color: rgb(167, 133, 0);
  }
</style>
<div class="container mt-4">
  <h4>Berita dengan Tag: <span class="text-warning">#<?php echo htmlspecialchars($_GET['tag']); ?></span></h4>
  <div class="row">
    <?php
    $tag = trim($_GET['tag']);
$berita = $conn->query("
  SELECT * FROM berita 
  WHERE CONCAT(',', REPLACE(tag, ' ', ''), ',') 
  LIKE '%," . str_replace(' ', '', $tag) . ",%' 
  ORDER BY tanggal DESC
");
    if(mysqli_num_rows($berita) > 0){
      while($b = $berita->fetch_assoc()) {
        echo "<div class='col-md-6 mb-4'>
                <div class='card'>
                  <img src='uploads/{$b['gambar']}' class='card-img-top'>
                  <div class='card-body'>
                    <h5><a href='detail.php?slug={$b['slug']}'>{$b['judul']}</a></h5>
                    <small class='text-muted'>Dipublikasikan: {$b['tanggal']}</small>
                    <p class='mt-2'>".substr(strip_tags($b['isi']),0,150)."...</p>
                    <div class='mt-2'>";
                      $tags = explode(',', $b['tag']);
                      foreach($tags as $t) {
                        $t = trim($t);
                        echo "<a href='tag.php?tag=" . urlencode($t) . "' class='badge bg-warning text-dark me-1'>#$t</a>";
                      }
        echo       "</div>
                  </div>
                </div>
              </div>";
      }
    } else {
      echo "<p class='text-muted'>Belum ada berita dengan tag ini.</p>";
    }
    ?>
  </div>
</div>

<?php include 'inc/footer.php'; ?>
