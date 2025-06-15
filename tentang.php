<?php include 'inc/header.php'; ?>

<style>
  .about-section {
    background: linear-gradient(135deg, #E3F2FD, #ffffff);
    padding: 4rem 0;
    text-align: center;
  }

  .about-img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
  }

  .about-img:hover {
    transform: scale(1.05);
  }

  .about-name {
    font-size: 2rem;
    font-weight: bold;
    margin-top: 1.2rem;
    background: linear-gradient(to right, #0D47A1, #2196F3);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .about-desc {
    max-width: 650px;
    margin: 1rem auto;
    font-size: 1.05rem;
    color: #444;
    line-height: 1.8;
  }

  .social-icons a {
    font-size: 1.8rem;
    margin: 0 12px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-icons a:hover {
    transform: translateY(-4px);
    color: #0D47A1 !important;
  }
</style>

<section class="about-section">
  <div class="container">
    <img src="uploads/bnga.jpg" alt="Foto Bunga" class="about-img">
    
    <h2 class="about-name">Bunga Alya Mukhbita</h2>

    <p class="about-desc">
      Halo! Saya adalah penulis dan pengelola <strong>BungaBuzz</strong>, portal berita yang menghadirkan informasi terkini, edukatif, dan menginspirasi dari berbagai sudut kehidupan. Tujuan saya adalah menjadikan berita bukan hanya informasi, tapi juga sumber semangat untuk pembaca.
    </p>

    <div class="social-icons">
      <a href="https://www.instagram.com/bngalya_/" class="text-danger" target="_blank"><i class="bi bi-instagram"></i></a>
      <a href="https://github.com/Buwnbun17" class="text-dark" target="_blank"><i class="bi bi-github"></i></a>
    </div>
  </div>
</section>

<?php include 'inc/footer.php'; ?>
