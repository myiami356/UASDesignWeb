<?php include '../inc/header.php'; ?>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

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
  color: #444;
  line-height: 1.6;
}

.card-body strong {
  color:rgb(0, 0, 0);
}

.card-body em {
  color: #666;
  font-style: italic;
  color:rgb(0, 0, 0);
}

.card-text {
  color:rgb(0, 0, 0);
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
  
  <div class="main-content">
    <div class="content-header">
      <h4>Dashboard</h4>
    </div>

    <div class="card shadow-sm">
      <div class="card-header card-header-blue">
        <h5 class="mb-0">Selamat Datang!</h5>
      </div>
      <div class="card-body">
        <p class="card-text">Halo Admin, selamat datang di Portal <strong>NamiNews</strong>.</p>
        <p class="card-text">Melalui halaman ini, Anda dapat mengelola <strong>kategori</strong> dan <strong>konten berita</strong> yang akan ditampilkan di website utama. Gunakan menu di sisi kiri untuk mulai mengelola konten Anda.</p>
        <p class="card-text"><em>Pastikan setiap berita memiliki kategori dan tagar yang relevan.</em></p>
      </div>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
