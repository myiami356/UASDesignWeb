<?php include '../inc/header.php'; ?>
<?php include '../db/config.php'; ?>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar Placeholder -->
    <div class="col-md-2"><!-- Kosong atau bisa diisi menu sidebar nanti --></div>

    <!-- Main Content -->
    <div class="col-md-10 mt-4">
      <h4>Tambah Kategori</h4>
      <form action="kategori_action.php" method="POST" style="max-width: 600px;">
        <div class="mb-3">
          <label for="nama_kategori" class="form-label">Nama Kategori</label>
          <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Simpan</button>
      </form>
    </div>
  </div>
</div>

<?php include '../inc/footer.php'; ?>
