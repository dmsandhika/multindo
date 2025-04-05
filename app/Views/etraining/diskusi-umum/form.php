<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container  mt-5">
  <h1 class="fw-bold">Form Topik</h1>
  <form method="post" action="<?= base_url('/e-training/diskusi-umum/save') ?>" enctype="multipart/form-data"
    class="shadow p-4 rounded">
    <div class="mb-3">
      <label for="namaMateri" class="form-label">Judul Topik</label>
      <input type="text" class="form-control" id="namaMateri" name="judul" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Simpan</button>
  </form>
</div>

<?= $this->endSection(); ?>