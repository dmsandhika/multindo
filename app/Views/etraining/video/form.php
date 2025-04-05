<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>
<div class="container  mt-5">
  <h1 class="fw-bold"><?= $title; ?></h1>
  <form action="<?= base_url('/e-training/video/upload') ?>" method="post" enctype="multipart/form-data"
    class="shadow p-4 rounded">
    <div class="mb-3">
      <label for="judulVideo" class="form-label">Judul Video</label>
      <input type="text" class="form-control" id="judulVideo" name="nama" required>
    </div>
    <div class="mb-3">
      <label for="fileVideo" class="form-label">Upload File Video</label>
      <input type="file" class="form-control" id="fileVideo" name="file" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Upload</button>
  </form>
</div>

<?= $this->endSection(); ?>