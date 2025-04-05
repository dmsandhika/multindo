<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
  <h1 class="text-center mb-4">DATA CALON KARYAWAN</h1>
  <div class="d-flex justify-content-between mb-3">
    <a href="<?= base_url('/karyawan/calon-karyawan/form') ?>" class="btn btn-info text-white">
      <i class="fas fa-user-plus"></i> Tambah Data
    </a>
  </div>
  <!-- Form Pencarian -->
  <form method="GET" action="<?= base_url('/karyawan/calon-karyawan') ?>" class="mb-3">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Cari nama calon karyawan..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i> Cari
      </button>
    </div>
  </form>

  <div class="table-responsive">
    <table class="table table-striped table-hover text-center shadow-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Posisi</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $index => $karyawan) : ?>
        <tr>
          <th scope="row"><?= $index + 1 ?></th>
          <td><?= htmlspecialchars($karyawan['nama']) ?></td>
          <td><?= htmlspecialchars($karyawan['nik']) ?></td>
          <td><?= htmlspecialchars($karyawan['posisi']['applied_position'] ?? '-') ?></td>
          <td>
            <button class="btn btn-success btn-sm">Lanjut</button>
            <button class="btn btn-danger btn-sm">Tidak</button>
          </td>
          <td>
            <a class="bs-warning" href="<?= base_url('karyawan/export-pdf/'.$karyawan['id']) ?>">
              PDF</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>
</div>

<?= $this->endSection(); ?>