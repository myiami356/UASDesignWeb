<?php include 'inc/header.php'; ?>

<style>
  .about-section {
    background:rgb(255, 255, 255);
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
    background: linear-gradient(to right, #FFA726, #F57C00); /* oren gradasi */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .about-desc {
    max-width: 680px;
    margin: 1.2rem auto;
    font-size: 1.05rem;
    color:rgb(0, 0, 0);
    line-height: 1.8;
  }

  .social-icons a {
    font-size: 1.8rem;
    margin: 0 14px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-icons a:hover {
    transform: translateY(-4px);
    color: #F57C00 !important; /* warna oren hover */
  }

  .about-box {
  background-color:rgb(255, 235, 157); /* putih kekuningan */
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  padding: 2.5rem;
  max-width: 900px;
  margin: 0 auto;
  transition: transform 0.3s ease;
}

.about-box:hover {
  transform: scale(1.01);
}

</style>

<section class="about-section">
  <div class="container">
    <div class="about-box">
      <img src="/uasdesignweb/uploads/ami.jpg" alt="Foto Najmi" class="about-img">
      <h2 class="about-name">Najmi Khairurizqa</h2>
      <p class="about-desc">
        Halo! Saya adalah penulis dan pengelola <strong>NamiNews</strong>, sebuah portal berita yang menyajikan informasi aktual, mendalam, dan terpercaya. Kami percaya bahwa berita bukan sekadar bacaan, tapi jendela dunia yang bisa membuka wawasan dan inspirasi bagi setiap pembaca.
      </p>
      <div class="social-icons">
        <a href="https://www.instagram.com/najmii.khq/" class="text-warning" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://github.com/myiami356" class="text-dark" target="_blank"><i class="bi bi-github"></i></a>
      </div>
    </div>
  </div>
</section>


<?php include 'inc/footer.php'; ?>
