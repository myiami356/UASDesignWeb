<?php include '../inc/header.php'; ?>
<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<style>
  :root {
    --blue-primary: #1E88E5;
    --blue-dark: #1565C0;
    --blue-light: #E3F2FD;
    --text-dark: #343a40;
    --text-on-blue: #ffffff;
  }

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
    background-color: var(--blue-primary);
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
  }

  .sidebar-header {
    padding: 20px;
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-on-blue);
    border-bottom: 1px solid var(--blue-dark);
    text-align: center;
  }

  .sidebar-nav {
    flex-grow: 1;
    margin-top: 20px;
  }

  .sidebar-nav a {
    color: var(--text-on-blue);
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 25px;
    text-decoration: none;
    font-size: 1rem;
    transition: background-color 0.2s ease-in-out, padding-left 0.2s ease-in-out;
  }

  .sidebar-nav a:hover {
    background-color: var(--blue-dark);
    padding-left: 30px;
  }

  .sidebar-nav a.active {
    background-color: var(--blue-light);
    color: var(--blue-dark);
    font-weight: 600;
  }

  .sidebar-nav a .fa-fw {
    width: 1.25em;
  }

  .main-content {
    flex-grow: 1;
    padding: 2rem;
  }

  .content-header {
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 1rem;
    margin-bottom: 2rem;
  }

  .content-header h4 {
    color: var(--text-dark);
    font-weight: 600;
  }

  .card-header-blue {
    background-color: var(--blue-primary);
    color: var(--text-on-blue);
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
        <p class="card-text">Halo Admin, selamat datang di Portal BungaBuzz.</p>
        <p class="card-text">Dari sini Anda dapat mengelola kategori dan konten berita yang akan ditampilkan di halaman depan website. Gunakan menu di sebelah kiri untuk memulai.</p>
      </div>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
