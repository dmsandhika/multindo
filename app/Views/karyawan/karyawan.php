<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
  <h1 class="text-center mb-4">Data Calon Karyawan</h1>
  
  <div class="table-responsive">
    <table class="table table-striped table-hover text-center shadow-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">NIK</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Dipa Firman A.D</td>
          <td>25253636</td>
          <td>Staff IT</td>
          <td>
            <a href="<?= base_url('/karyawan/export-pdf/1') ?>" class="btn btn-warning btn-sm">PDF</a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Pradipta</td>
          <td>25253636</td>
          <td>Staff Legal</td>
          <td>
            <a href="<?= base_url('/karyawan/export-pdf/2') ?>" class="btn btn-warning btn-sm">PDF</a>
          </td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Shaka Pradipta</td>
          <td>25253636</td>
          <td>Staff HR</td>
          <td>
            <a href="<?= base_url('/karyawan/export-pdf/3') ?>" class="btn btn-warning btn-sm">PDF</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>
