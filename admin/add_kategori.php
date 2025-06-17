<?php include '../inc/header.php'; ?>
<?php include '../db/config.php'; ?>
<?php $currentPage = 'add_kategori.php'; ?>


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

  .main-content {
    flex-grow: 1;
    padding: 2rem;
    margin-top: 80px;
  }

  .content-header {
    border-bottom: 1px solidrgb(255, 208, 0);
    padding-bottom: 1rem;
    margin-bottom: 2rem;
  }

  .content-header h4 {
    color:rgb(0, 0, 0);
    font-weight: 600;
  }

  .card-header-blue {
    background-color:rgb(247, 238, 111);
    color: #000000;
  }

  .form-label {
    font-weight: 600;
    color: #000000;
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
      <div class="card shadow-sm">
      <div class="card-header card-header-blue">
        <h4 class="mb-0">Tambah Kategori</h4>
      </div>
      <div class="card-body">
        <form action="kategori_action.php" method="POST" style="max-width: 900px;">
          <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-warning">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
