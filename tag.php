<?php include 'inc/header.php'; include 'db/config.php'; ?>

<div class="container mt-4">
  <h4>Berita dengan Tag: <span class="text-primary">#<?php echo $_GET['tag']; ?></span></h4>
  <div class="row">
    <?php
    $tag = $_GET['tag'];
    $berita = $conn->query("SELECT * FROM berita WHERE tag LIKE '%$tag%' ORDER BY tanggal DESC");
    if(mysqli_num_rows($berita) > 0){
      while($b = $berita->fetch_assoc()) {
        echo "<div class='col-md-6 mb-4'>
                <div class='card'>
                  <img src='uploads/{$b['gambar']}' class='card-img-top'>
                  <div class='card-body'>
                    <h5><a href='detail.php?slug={$b['slug']}'>{$b['judul']}</a></h5>
                    <small class='text-muted'>Dipublikasikan: {$b['tanggal']}</small>
                    <p class='mt-2'>".substr(strip_tags($b['isi']),0,150)."...</p>
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
