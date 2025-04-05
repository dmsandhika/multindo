<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container">
  <h1>Materi</h1>
  <a href="<?= base_url('/e-training/materi/form') ?>" class=" btn mb-2 btn-info text-white">Tambah Materi</a>
  <?php foreach ($data as $index => $m): ?>
  <div class="card mx-auto my-2">
    <h5 class="card-header">Materi <?= $index + 1 ?></h5>
    <div class="card-body">
      <h5 class="card-title"><?= esc($m['nama']) ?></h5>
      <a href="<?= base_url('uploads/materi/' . esc($m['file'])) ?>" class="btn btn-primary">Unduh Materi</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>