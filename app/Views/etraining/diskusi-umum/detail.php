<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container my-3">
  <h2>Diskusi Umum</h2>
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5>Diskusi: <?= esc($data['judul']) ?></h5>
    </div>
    <div class="card-body">
      <?php foreach ($komentar as $index => $m): ?>
      <?php $alignment = ($index % 2 == 0) ? 'justify-content-end' : 'justify-content-start'; ?>
      <?php $bgColor = ($index % 2 == 0) ? '#b8f5ee' : '#9dfcf1'; ?>
      <div class="d-flex <?= $alignment ?> mb-2">
        <div class="p-3 rounded" style="max-width: 75%; background-color: <?= $bgColor ?>;">
          <strong><?= esc($m['nama']) ?></strong>
          <p class="mb-0"><?= esc($m['komentar']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Form untuk menambahkan komentar baru -->
  <div class="mt-3">
    <h5>Tambahkan Komentar</h5>
    <form action="<?= base_url('/e-training/diskusi-umum/komentar') ?>" method="post">
      <input type="hidden" name="topik_id" value="<?= esc($data['id']) ?>">
      <div class="mb-2">
        <input type="text" name="nama" class="form-control" placeholder="Nama Anda" required>
      </div>
      <div class="mb-2">
        <textarea name="komentar" class="form-control" placeholder="Tulis komentar..." required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
  </div>
</div>


<?= $this->endSection(); ?>