<?php
  $currentPage = basename($_SERVER['PHP_SELF']);
  include '../inc/header.php';
  include '../db/config.php';
?>

<style>
  body {
    background-color: #f8f9fa;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .wrapper {
    display: flex;
    min-height: 100vh;
  }

  .sidebar {
    width: 240px;
    background-color:rgb(247, 238, 111); /* kuning pastel utama */
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
  }

  .sidebar-header {
    padding: 20px;
    font-size: 1.25rem;
    font-weight: 600;
    color: #000;
    border-bottom: 1px solid #d3b80f;
    text-align: center;
    line-height: 1.5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 80px; /* Tambahkan margin atas untuk menghindari tumpang tindih dengan navbar */
}
.sidebar-header i {
  margin-right: 8px;
  font-size: 1.25rem;
}
  .sidebar-nav {
    flex-grow: 1;
    margin-top: 20px;
  }

  .sidebar-nav a {
    color: #000000;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 25px;
    text-decoration: none;
    font-size: 1rem;
    transition: background-color 0.2s ease-in-out, padding-left 0.2s ease-in-out;
  }

  .sidebar-nav a:hover {
    background-color:rgb(255, 210, 74); /* kuning lebih gelap */
    padding-left: 30px;
  }

  .sidebar-nav a.active {
    background-color:rgb(255, 204, 0); /* kuning paling terang */
    color: #000000;
    font-weight: 600;
  }

  .sidebar-nav a .fa-fw {
    width: 1.25em;
  }

/* Main Content Wrapper */
.main-content {
  flex-grow: 1;
  padding: 2rem;
  margin-top: 80px; /* Hindari ketutup navbar */
  background-color: #fdfdfd;
  min-height: 100vh;
}

/* Header di atas card */
.content-header {
  border-bottom: 2px solid #f2c94c;
  padding-bottom: 1rem;
  margin-bottom: 2rem;
  max-width: 1000px;    /* Lebar maksimal kotaknya */
  width: 100%;    
}

.content-header h4 {
  color: #333;
  font-weight: bold;
}

/* Card Style */
.card {
  border-radius: 10px;
  border: 1px solid #e0e0e0;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  max-width: 1000px;    /* Lebar maksimal kotaknya */
  width: 100%;         /* Supaya fleksibel di layar kecil */
}

/* Card Header dengan warna kuning muda */
.card-header-blue {
  background-color: #fbe17d;
  color: #000;
  font-weight: bold;
  border-bottom: 1px solid #e0c94c;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

/* Card Body */
.card-body {
  background-color: #fffef8;
  padding: 1.5rem;
  font-size: 1rem;
  color: rgb(0, 0, 0);
  line-height: 1.6;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.card-body strong {
  color:rgb(0, 0, 0);
}

.card-body em {
  color: #666;
  font-style: italic;
}

</style>

<div class="wrapper">
  <div class="sidebar">
    <div class="sidebar-header">
      <i class="fas fa-user-shield"></i> Admin Panel
    </div>
    <nav class="sidebar-nav">
      <a href="dashboard.php" class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
        <i class="fas fa-tachometer-alt fa-fw"></i> Dashboard
      </a>
      <a href="add_kategori.php" class="<?php echo ($currentPage == 'add_kategori.php') ? 'active' : ''; ?>">
        <i class="fas fa-tags fa-fw"></i> Kategori Berita
      </a>
      <a href="add_berita.php" class="<?php echo ($currentPage == 'add_berita.php') ? 'active' : ''; ?>">
        <i class="fas fa-newspaper fa-fw"></i> Berita
      </a>
    </nav>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="container">
      <div class="card">
        <div class="card-header" style="background-color: rgb(247, 238, 111); color: #000;">
          <h5 class="mb-0">Tambah Berita</h5>
        </div>
        <div class="card-body">
          <form action="berita_action.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="judul" class="form-label">Judul Berita</label>
              <input type="text" name="judul" id="judul" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="isi" class="form-label">Isi Berita</label>
              <textarea name="isi" id="isi" rows="6" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
              <label for="id_kategori" class="form-label">Kategori</label>
              <select name="id_kategori" id="id_kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php
                $kat = $conn->query("SELECT * FROM kategori");
                while($k = $kat->fetch_assoc()) {
                  echo "<option value='{$k['id']}'>{$k['nama_kategori']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="datetime-local" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label>
              <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
              <label for="tag" class="form-label">Tagar (pisahkan dengan koma)</label>
              <input type="text" name="tag" class="form-control" placeholder="Contoh: politik, ekonomi, nasional">
            </div>

            <button type="submit" class="btn btn-warning">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
