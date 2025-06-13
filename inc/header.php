<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NajmiNews</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <style>
    :root {
      --warna-biru-utama: #0D47A1;
      --warna-biru-hover: #08306b;
      --warna-biru-muda: #2196F3;
      --warna-biru-terang: #E3F2FD;
    }

    /* Navbar Styles */
    .navbar-custom {
      background: linear-gradient(135deg, var(--warna-biru-utama) 0%, var(--warna-biru-muda) 100%);
      box-shadow: 0 4px 12px rgba(13, 71, 161, 0.2);
      padding: 0.5rem 0;
      z-index: 1000;
    }

    .navbar-custom::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 3px;
      background: linear-gradient(90deg, var(--warna-biru-muda), var(--warna-biru-hover), var(--warna-biru-muda));
    }

    .navbar-brand-custom {
      font-weight: 700;
      font-size: 1.8rem;
      background: linear-gradient(to right, white 0%, #E3F2FD 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .navbar-brand-custom:hover {
      transform: translateY(-2px);
      text-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .search-input-custom {
      border-radius: 25px;
      padding: 0.5rem 1.5rem;
      border: 2px solid rgba(255,255,255,0.3);
      background-color: rgba(255,255,255,0.2);
      color: white;
    }

    .search-input-custom:focus {
      background-color: rgba(255,255,255,0.3);
      border-color: white;
      box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
    }

    .search-input-custom::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .search-btn-custom {
      background-color: white;
      color: var(--warna-biru-utama);
      border-radius: 25px;
      padding: 0.5rem 1.2rem;
      font-weight: 600;
      border: none;
    }

    .search-btn-custom:hover {
      background-color: var(--warna-biru-terang);
      color: var(--warna-biru-hover);
    }

    /* Fix untuk konten tidak ketiban navbar */
    body {
      padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand navbar-brand-custom" href="index.php">NajmiNews</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <i class="bi bi-house-door-fill"></i>
            </a>
          </li>
        </ul>

        <form class="d-flex" action="search.php" method="GET">
          <input class="form-control search-input-custom me-2" type="search" placeholder="Cari berita..." name="q">
          <button class="btn search-btn-custom" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>
