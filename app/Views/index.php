<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<div class="container text-center mt-5">
  <h1 class="fw-bold">RECRUITMENT AND TRAINING CENTER</h1>
  <h1 class="fw-bold">MULTINDO</h1>
  <p>Selamat datang di layanan online Recruitment and Training Center.</p>

  <!-- Tombol Hubungi Kami -->
  <a href="https://wa.me/6285779107608?text=Halo%20saya%20tertarik%20dengan%20Recruitment%20dan%20Training%20Center" 
     class="btn custom-button mt-3" target="_blank">
    <i class="fab fa-whatsapp"></i> Hubungi Kami
  </a>
</div>

<!-- Watermark -->
<footer class="text-center text-muted small" style="position: fixed; bottom: 10px; width: 100%; opacity: 0.5;">
  @ HRD PT MULTINDO AUTO FINANCE.2025
</footer>

<!-- CSS Kustom -->
<style>
  .custom-button {
    background-color: transparent;
    border: 2px solid white;
    color: white;
    border-radius: 50px;
    padding: 10px 20px;
    font-weight: bold;
    transition: 0.3s;
  }

  .custom-button:hover {
    background-color: green;
    color: white;
  }
</style>

<?= $this->endSection(); ?>