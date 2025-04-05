<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container">
  <h1>Topik Diskusi</h1>
  <a href="<?= base_url('/e-training/diskusi-umum/form') ?>" class=" btn mb-2 btn-info text-white">Tambah Topik</a>
  <?php foreach ($data as $index => $m): ?>
  <div class="card mx-auto my-2">
    <h5 class="card-header">Topik <?= $index + 1 ?></h5>
    <div class="card-body">
      <h5 class="card-title"><?= esc($m['judul']) ?></h5>
      <a href="<?= base_url('/e-training/diskusi-umum/'.$m['id']) ?>" class="btn btn-primary">Lihat Topik</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>