<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container">
  <h1>Video</h1>
  <a href="<?= base_url('/e-training/video/form') ?>" class=" btn mb-2 btn-info text-white">Tambah Video</a>
  <?php foreach ($data as $index => $m): ?>
  <div class="card mx-auto my-2">
    <h5 class="card-header">Video <?= $index + 1 ?></h5>
    <div class="card-body">
      <h5 class="card-title"><?= esc($m['nama']) ?></h5>
      <video width="320" height="240" controls>
        <source src="<?= base_url('uploads/video/' . esc($m['file'])) ?>" type="video/mp4">
        Browser Anda tidak mendukung tag video.
      </video>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>