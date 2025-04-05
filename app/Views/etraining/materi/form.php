<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container  mt-5">
  <h1 class="fw-bold"><?= $title; ?></h1>
  <form action="<?= base_url('/e-training/materi/upload') ?>" method="post" enctype="multipart/form-data"
    class="shadow p-4 rounded">
    <div class="mb-3">
      <label for="namaMateri" class="form-label">Nama Materi</label>
      <input type="text" class="form-control" id="namaMateri" name="nama" required>
    </div>
    <div class="mb-3">
      <label for="fileMateri" class="form-label">Upload File Materi</label>
      <input type="file" class="form-control" id="fileMateri" name="file" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Upload</button>
  </form>
</div>

<?= $this->endSection(); ?>