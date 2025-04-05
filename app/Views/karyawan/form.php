<?= $this->extend('layout/main') ?>
<?= $this->section('content'); ?>

<div class="container">
  <h1>Form Calon Karyawan</h1>
  <form action="<?= base_url('/karyawan/calon-karyawan/save') ?>" method="post" class="shadow p-4 rounded"
    enctype="multipart/form-data">
    <?= csrf_field() ?>
    <fieldset id="data-diri" class="p-3 mb-4 shadow p-4 rounded">
      <legend class="w-auto">1. Data Diri</legend>
      <div class="mb-3">
        <label class="form-label">N.I.K</label>
        <input type="text" name="nik" class="form-control" id="nik" maxlength="16" oninput="validateNIK(this)">
        <small class="text-danger" id="nik-error"></small>
      </div>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control">
      </div>

      <!-- Upload Pas Foto -->
      <div class="mb-3">
        <label class="form-label">Upload Pas Foto</label>
        <input type="file" name="pas_foto" class="form-control">
      </div>

      <!-- Alamat -->
      <h6 class="mt-3">Alamat</h6>
      <textarea name="alamat" class="form-control mb-2" placeholder="Alamat"></textarea>
      <div class="mb-2">
        <div class="d-flex gap-2">
          <input type="number" name="rt" class="form-control" placeholder="RT">
          <input type="number" name="rw" class="form-control" placeholder="RW">
        </div>
      </div>
      <div class="mb-3">
        <select name="provinsi" id="provinsi" class="form-control">
          <option value="">Pilih Provinsi</option>
          <?php foreach ($provinsi as $p): ?>
          <option value="<?= $p['kode']; ?>"><?= $p['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3" id="kabupaten_box" style="display: none;">
        <select name="kota" id="kabupaten" class="form-control">
          <option value="">Pilih Kabupaten</option>
        </select>
      </div>

      <div class="mb-3" id="kecamatan_box" style="display: none;">
        <select name="kecamatan" id="kecamatan" class="form-control">
          <option value="">Pilih Kecamatan</option>
        </select>
      </div>

      <div class="mb-3" id="kelurahan_box" style="display: none;">
        <select name="kelurahan" id="kelurahan" class="form-control">
          <option value="">Pilih Kelurahan</option>
        </select>
      </div>

      <input type="number" class="form-control mb-2" name="kode_pos" placeholder="Kode Pos">

      <h6 class="mt-3">Alamat Orang Tua</h6>
      <textarea name="alamat_orang_tua" class="form-control mb-2" placeholder="Alamat Orang Tua"></textarea>
      <div class="mb-2">
        <div class="d-flex gap-2">
          <input type="number" name="rt_orang_tua" class="form-control" placeholder="RT">
          <input type="number" name="rw_orang_tua" class="form-control" placeholder="RW">
        </div>
      </div>
      <div class="mb-3">
        <select name="provinsi_orang_tua" id="provinsi_ortu" class="form-control">
          <option value="">Pilih Provinsi</option>
          <?php foreach ($provinsi as $p): ?>
          <option value="<?= $p['kode']; ?>"><?= $p['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3" id="kabupaten_box_ortu" style="display: none;">
        <select name="kota_orang_tua" id="kabupaten_ortu" class="form-control">
          <option value="">Pilih Kabupaten</option>
        </select>
      </div>

      <div class="mb-3" id="kecamatan_box_ortu" style="display: none;">
        <select name="kecamatan_orang_tua" id="kecamatan_ortu" class="form-control">
          <option value="">Pilih Kecamatan</option>
        </select>
      </div>

      <div class="mb-3" id="kelurahan_box_ortu" style="display: none;">
        <select name="kelurahan_orang_tua" id="kelurahan_ortu" class="form-control">
          <option value="">Pilih Kelurahan</option>
        </select>
      </div>
      <input type="number" class="form-control mb-2" name="kode_pos_orang_tua" placeholder="Kode Pos">
      <div class="mb-3">
        <label class="form-label">Identitas</label>
        <input type="number" name="no_ktp" class="form-control mb-2" placeholder="No. KTP">
        <div class="d-flex gap-2 mb-2">
          <input type="number" name="no_sim_a_b1_b2" class="form-control" placeholder="No. SIM A/B1/B2">
          <input type="number" name="no_sim_c" class="form-control" placeholder="No. SIM C">
        </div>
        <div class="d-flex gap-2 mb-2">
          <input type="number" name="no_jamsostek" class="form-control" placeholder="No. Jamsostek">
          <input type="number" name="no_npwp" class="form-control" placeholder="No. NPWP">
        </div>
        <input type="number" name="no_rekening" class="form-control mb-2" placeholder="No. Rekening Tabungan">
        <div class="d-flex gap-2 mb-2">
          <input type="text" name="bank" class="form-control" placeholder="Bank">
          <input type="text" name="cabang_bank" class="form-control" placeholder="Cabang">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="number" name="no_hp" class="form-control" id="no_hp" maxlength="13">
      </div>
      <div class="mb-3">
        <label class="form-label">Status Rumah</label>
        <select name="status_rumah" id="">
          <option value="Milik Sendiri">Milik Sendiri</option>
          <option value="Kontrak">Kontrak</option>
          <option value="Keluarga">Keluarga</option>
          <option value="Kost">Kost</option>
          <option value="Sewa/Kontrak">Sewa/Kontrak</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Jenis Kelamin</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki">
          <label class="form-check-label" for="laki-laki">Laki-laki</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
          <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Warga Negara</label>
        <select name="warga_negara" id="">
          <option value="WNI">WNI</option>
          <option value="WNA">WNA</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Suku Bangsa</label>
        <input type="text" name="suku_bangsa" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
      </div>
      <div class="mb-3">

        <script>
        function hitungUmur() {
          // Ambil nilai tanggal lahir
          let tanggalLahir = document.querySelector("input[name='tanggal_lahir']").value;
          if (!tanggalLahir) return;

          let tglLahir = new Date(tanggalLahir);
          let tglSekarang = new Date();

          let tahun = tglSekarang.getFullYear() - tglLahir.getFullYear();
          let bulan = tglSekarang.getMonth() - tglLahir.getMonth();

          // Jika bulan lahir lebih besar dari bulan sekarang, kurangi 1 tahun dan tambah 12 bulan
          if (bulan < 0) {
            tahun -= 1;
            bulan += 12;
          }

          // Masukkan hasil ke dalam input usia
          document.querySelector("input[name='usia_tahun']").value = tahun;
          document.querySelector("input[name='usia_bulan']").value = bulan;
        }
        </script>
        <div class="container">
          <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" onchange="hitungUmur()">
          </div>
          <div class="mb-3">
            <label class="form-label">Usia</label>
            <div class="d-flex gap-2">
              <input type="number" name="usia_tahun" class="form-control" readonly> <span
                class="align-self-center">Tahun</span>
              <input type="number" name="usia_bulan" class="form-control" readonly> <span
                class="align-self-center">Bulan</span>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Agama</label>
        <select name="agama" id="">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Golongan Darah</label>
        <select name="golongan_darah" id="">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
          <option value="O">O</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Tinggi Badan</label>
        <input type="number" name="tinggi_badan" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Berat Badan</label>
        <input type="number" name="berat_badan" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Warna Kulit</label>
        <input type="text" name="warna_kulit" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Ciri Ciri Khusus</label>
        <input type="text" name="ciri_khusus" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Status Marital</label>
        <select name="status_marital" id="statusMarital" onchange="toggleFamilyTable()">
          <option value="">Pilih Status</option>
          <option value="Belum Menikah">Belum Menikah</option>
          <option value="Menikah">Menikah</option>
          <option value="Duda">Duda</option>
          <option value="Janda">Janda</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Status Dalam Keluarga</label>
        <select name="status_keluarga" id="">
          <option value="Kepala Keluarga">Kepala Keluarga</option>
          <option value="Istri">Istri</option>
          <option value="Anak">Anak</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </div>
      <div id="marriedSection" style="display: none;">
        <label class="form-label">SUSUNAN KELUARGA (Bagi yang sudah menikah)</label>
        <div style="max-width: 100%; overflow-x: auto;">
          <table id="marriedTable" class="table table-bordered" style="white-space: nowrap;">
            <thead class="table-dark">
              <tr>
                <th>Keterangan</th>
                <th>Nama</th>
                <th>P/W</th>
                <th>Usia</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Status Pernikahan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Suami/Istri</td>
                <td><input type="text" class="form-control" name="nama_suami_istri"></td>
                <td><input type="text" class="form-control" name="pw_suami_istri"></td>
                <td><input type="number" class="form-control" name="usia_suami_istri"></td>
                <td><input type="text" class="form-control" name="pendidikan_suami_istri"></td>
                <td><input type="text" class="form-control" name="pekerjaan_suami_istri"></td>
                <td><input type="text" class="form-control" name="status_pernikahan_suami_istri"></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="button" onclick="addChild('marriedTable')">Tambah Anak</button>
      </div>

      <div id="singleSection" style="display: none;">
        <label class="form-label">SUSUNAN KELUARGA (Bagi yang belum menikah)</label>
        <div style="max-width: 100%; overflow-x: auto;">
          <table id="singleTable" class="table table-bordered" style="white-space: nowrap;">
            <thead class="table-dark">
              <tr>
                <th>Keterangan</th>
                <th>Nama</th>
                <th>P/W</th>
                <th>Usia</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Status Pernikahan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ayah</td>
                <td><input type="text" class="form-control" name="nama_ayah"></td>
                <td><input type="text" class="form-control" name="pw_ayah"></td>
                <td><input type="number" class="form-control" name="usia_ayah"></td>
                <td><input type="text" class="form-control" name="pendidikan_ayah"></td>
                <td><input type="text" class="form-control" name="pekerjaan_ayah"></td>
                <td><input type="text" class="form-control" name="status_pernikahan_ayah"></td>
                <td></td>
              </tr>
              <tr>
                <td>Ibu (Nama Gadis)</td>
                <td><input type="text" class="form-control" name="nama_ibu"></td>
                <td><input type="text" class="form-control" name="pw_ibu"></td>
                <td><input type="number" class="form-control" name="usia_ibu"></td>
                <td><input type="text" class="form-control" name="pendidikan_ibu"></td>
                <td><input type="text" class="form-control" name="pekerjaan_ibu"></td>
                <td><input type="text" class="form-control" name="status_pernikahan_ibu"></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
        <button type="button" class="mt-2" onclick="addChild('singleTable')">Tambah Anak</button>
      </div>

      <button type="button" class="btn btn-info w-100"
        onclick="nextStep('data-diri', 'pendidikan-keterampilan')">Next</button>
    </fieldset>


    <!-- Identitas -->
    <fieldset id="pendidikan-keterampilan" class="shadow p-4 rounded p-3 mb-4 d-none">
      <legend class="w-auto">2. Pendidikan dan Keterampilan</legend>

      <!-- Pendidikan -->
      <div class="flex mb-3">
        <label class="form-label">Pendidikan</label>
        <div style="max-width: 100%; overflow-x: auto;">
          <?php $sekolah = ['SD', 'SMP', 'SMA', 'S1', 'S2']; ?>
          <table id="singleTable" class="table table-bordered" style="white-space: nowrap;">
            <thead class="table-dark">
              <tr>
                <th>Jenis Sekolah</th>
                <th>Nama Sekolah</th>
                <th>Tempat Sekolah</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
                <th>Berijazah/Tidak</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sekolah as $jenis): ?>
              <tr>
                <td><?= htmlspecialchars($jenis) ?></td>
                <td><input type="text" class="form-control" name="nama_sekolah[]"></td>
                <td><input type="text" class="form-control" name="tempat_sekolah[]"></td>
                <td><input type="number" class="form-control" name="tahun_masuk[]"></td>
                <td><input type="number" class="form-control" name="tahun_lulus[]"></td>
                <td>
                  <select class="form-control" name="berijazah[]">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Kursus dan Penataran -->
      <div class="flex mb-3">
        <label class="form-label">Kursus dan Penataran</label>
        <div style="max-width: 100%; overflow-x: auto;">
          <table id="kursusTable" class="table table-bordered" style="white-space: nowrap;">
            <thead class="table-dark">
              <tr>
                <th>Jenis Kursus/Penataran</th>
                <th>Tahun</th>
                <th>Lama Kursus</th>
                <th>Ijazah / Keterangan</th>
                <th>Dibiayai Oleh</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" class="form-control" name="jenis_kursus[]"></td>
                <td><input type="number" class="form-control" name="tahun_kursus[]"></td>
                <td><input type="number" class="form-control" name="lama_kursus[]"></td>
                <td><input type="text" class="form-control" name="ijazah_kursus[]"></td>
                <td><input type="text" class="form-control" name="dibiayai_oleh[]"></td>
                <td><button type="button" class="btn btn-danger btn-remove">Hapus</button></td>
              </tr>
            </tbody>
          </table>
          <button type="button" id="add-kursus-row" class="mt-2 btn btn-success">Tambah Baris</button>
        </div>
      </div>

      <!-- Kemampuan Berbahasa -->
      <div class="flex mb-3">
        <label class="form-label">Kemampuan Berbahasa</label>
        <div style="max-width: 100%; overflow-x: auto;">
          <table id="bahasaTable" class="table table-bordered" style="white-space: nowrap;">
            <thead class="table-dark">
              <tr>
                <th>Keterangan</th>
                <th>Aktif/Pasif</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Bahasa Nasional : Indonesia</td>
                <td><input type="text" class="form-control" name="bahasa_indonesia"></td>
              </tr>
              <tr>
                <td>Bahasa Daerah : <input type="text" class="form-control" name="bahasa_daerah"></td>
                <td><input type="text" class="form-control" name="status_bahasa_daerah"></td>
              </tr>
              <tr>
                <td>Bahasa Asing : <input type="text" class="form-control" name="bahasa_asing"></td>
                <td><input type="text" class="form-control" name="status_bahasa_asing"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pendidikan Luar Negeri -->
      <div class="mb-3">
        <label class="form-label">Pernahkah Anda bersekolah / mengikuti pendidikan / kursus di luar negeri?<br>Bila
          pernah, sebutkan tahun berapa, dalam bidang apa, gelar yang diperoleh, dan prestasi</label>
        <div>
          <textarea class="w-75 mx-auto form-control" name="pendidikan_luar_negeri"></textarea>
        </div>
      </div>

      <!-- Beasiswa -->
      <div class="mb-3">
        <label class="form-label">Pernahkah Anda mendapat beasiswa? Bila pernah, sebutkan tahun berapa, dalam bidang
          apa, gelar apa yang diperoleh, prestasi, dan penyelenggara/pemberi beasiswa</label>
        <div>
          <textarea class="w-75 mx-auto form-control" name="beasiswa"></textarea>
        </div>
      </div>

      <!-- Navigasi -->
      <button type="button" class="btn btn-secondary w-100 mb-2"
        onclick="prevStep('pendidikan-keterampilan', 'data-diri')">Back</button>
      <button type="button" class="btn btn-info w-100"
        onclick="nextStep('pendidikan-keterampilan', 'pengalaman-kerja')">Next</button>
    </fieldset>


    <!-- Pengalaman Kerja -->
    <fieldset id="pengalaman-kerja" class="shadow p-4 rounded p-3 mb-4 d-none">
      <legend class="w-auto">3. Pengalaman Kerja</legend>
      <div>
        <div id="formContainer">
          <div class="form-experience p-3 mb-3">
            <div class="row">
              <div class="col-md-6">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control" name="company_name[]">
              </div>
              <div class="col-md-6">
                <label class="form-label">Nama Atasan</label>
                <input type="text" class="form-control" name="superior_name[]">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="form-label">Jabatan</label>
                <input type="text" class="form-control" name="position_title[]">
              </div>
              <div class="col-md-6">
                <label class="form-label">Alamat Perusahaan</label>
                <input type="text" class="form-control" name="company_address[]">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="form-label">Masa Kerja</label>
                <div class="d-flex">
                  <input type="text" class="form-control" name="work_start_date[]" placeholder="Mulai">
                  <span class="mx-2">s/d</span>
                  <input type="text" class="form-control" name="work_end_date[]" placeholder="Selesai">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">No. Telepon</label>
                <input type="text" class="form-control" name="company_phone[]">
              </div>
            </div>
            <div class="mt-2">
              <label class="form-label">Gaji dan Tunjangan</label>
              <input type="text" class="form-control" name="salary_benefits[]">
            </div>
            <div class="mt-2">
              <label class="form-label">Deskripsi Pekerjaan</label>
              <textarea class="form-control" name="job_description[]" rows="3"></textarea>
            </div>
            <div class="mt-2">
              <label class="form-label">Alasan Berhenti</label>
              <textarea class="form-control" name="reason_for_leaving[]" rows="2"></textarea>
            </div>
            <button type="button" class="btn btn-danger mt-3 remove-btn">Hapus</button>
          </div>
        </div>
        <button type="button" id="addFormExp" class="btn btn-primary">Tambah</button>
        <button type="button" class="btn btn-secondary w-100 mb-2"
          onclick="prevStep('pengalaman-kerja', 'pendidikan-keterampilan')">Back</button>
        <button type="button" class="btn btn-info w-100" onclick="nextStep('pengalaman-kerja', 'lamaran')">Next</button>
      </div>
    </fieldset>
    <fieldset id="lamaran" class="shadow p-4 rounded p-3 mb-4 d-none">
      <legend class="w-auto">4. Lamaran</legend>
      <div class="mb-3">
        <label class="form-label">Posisi yang dilamar</label>
        <input type="text" name="applied_position" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Gaji yang diharapkan</label>
        <input type="number" name="expected_salary" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Ingin Memperoleh tunjangan?</label>
        <select name="benefits_option" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
      </div>
      <div class="mt-4">
        <button type="button" class="btn btn-secondary w-100 mb-2"
          onclick="prevStep('lamaran', 'pengalaman-kerja')">Back</button>
        <button type="button" class="btn btn-info w-100" onclick="nextStep('lamaran', 'organisasi')">Next</button>
      </div>
    </fieldset>
    <fieldset id="organisasi" class="shadow p-4 rounded p-3 mb-4 d-none">
      <legend class="w-auto">5. Organisasi</legend>
      <div class="mb-3">
        <label class="form-label">Kegemaran/Hobi</label>
        <input type="text" name="hobi" class="form-control">
      </div>
      <div class="mb-4">
        <label class="form-label">Organisasi yang pernah diikuti</label>
        <div id="organisasiContainer">
          <div class="org-form p-3 mb-3 border rounded">
            <div class="row">
              <div class="col-md-6 mb-2">
                <input type="text" name="organization_name[]" class="form-control" placeholder="Nama Organisasi">
              </div>
              <div class="col-md-6 mb-2">
                <input type="text" name="organization_type[]" class="form-control" placeholder="Jenis Organisasi">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-2">
                <input type="text" name="organization_position[]" class="form-control" placeholder="Jabatan Organisasi">
              </div>
              <div class="col-md-6 mb-2">
                <input type="text" name="organization_year[]" class="form-control" placeholder="Tahun Organisasi">
              </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-btn-org">Hapus</button>
          </div>
        </div>
        <button type="button" id="addOrg" class="btn btn-primary btn-sm">Tambah</button>
      </div>
      <div class="mt-4">
        <button type="button" class="btn btn-secondary w-100 mb-2"
          onclick="prevStep('organisasi', 'lamaran')">Back</button>
        <button type="button" class="btn btn-info w-100" onclick="nextStep('organisasi', 'lain-lain')">Next</button>
      </div>
    </fieldset>
    <fieldset id="lain-lain" class="shadow p-4 rounded p-3 mb-4 d-none">
      <legend class="w-auto">6. Lain-lain</legend>
      <div class="mb-3">
        <label class="form-label">1. Apakah anda pernah berkacamata?</label>
        <select name="kacamata" id="kacamata" class="form-select">
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>
      <div id="detailKacamata" style="display: none;">
        <div class="mb-3">
          <label class="form-label">Jenis Kacamata</label>
          <select name="jenis_kacamata" class="form-select">
            <option value="" selected disabled>Pilih Jenis Kacamata</option>
            <option value="minus">Minus</option>
            <option value="plus">Plus</option>
            <option value="silinder">Silinder</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="sejak_kapan" class="form-label">Sejak Kapan</label>
          <input type="text" name="sejak_kapan" class="form-control" placeholder="Tahun mulai pakai kacamata">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">2. Apakah anda pernah menderita penyakit berat, sampai harus dibawa ke rumah
          sakit?</label>
        <select name="penyakit" id="penyakit" class="form-select">
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>

      <div id="detailPenyakit" style="display: none;">
        <div class="mb-3">
          <label class="form-label">Tahun Berapa</label>
          <input type="text" class="form-control" name="tahun_penyakit" placeholder="Tahun Berapa">
        </div>
        <div class="mb-3">
          <label class="form-label">Berapa Lama</label>
          <input type="text" class="form-control" name="lama_penyakit" placeholder="Berapa Lama">
        </div>
        <div class="mb-3">
          <label class="form-label">Diagnosa</label>
          <input type="text" class="form-control" name="diagnosa" placeholder="Diagnosa">
        </div>
        <div class="mb-3">
          <label class="form-label">Dirawat dimana</label>
          <input type="text" class="form-control" name="tempat_rawat" placeholder="Dirawat dimana">
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">3. Apakah anda pernah mengikuti evaluasi psikologi / psikotest?</label>
        <select name="psikologi" id="psikologi" class="form-select">
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>

      <!-- Form detail psikologi (Hidden by default) -->
      <div id="detailPsikologi" style="display: none;">
        <div class="mb-3">
          <label class="form-label">Tahun Berapa</label>
          <input type="text" class="form-control" name="tahun_psikologi" placeholder="Tahun Berapa">
        </div>
        <div class="mb-3">
          <label class="form-label">Berapa Lama</label>
          <input type="text" class="form-control" name="lama_psikologi" placeholder="Berapa Lama">
        </div>
        <div class="mb-3">
          <label class="form-label">Diagnosa</label>
          <input type="text" class="form-control" name="diagnosa_psikologi" placeholder="Diagnosa">
        </div>
        <div class="mb-3">
          <label class="form-label">Untuk Keperluan :</label>
          <input type="text" class="form-control" name="keperluan" placeholder="keperluan">
        </div>

        <div class="mb-3">
          <label>Bersediakah anda menjalani evaluasi psikologi setelah masuk perusahaan ini?</label>
          <select name="evaluasi_psikologi" id="evaluasi_psikologi" class="form-select">
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
          </select>
        </div>

        <!-- Form alasan evaluasi (Hidden by default) -->
        <div class="mb-3" id="alasanEvaluasi" style="display: none;">
          <label>Alasan</label>
          <input type="text" name="alasan_evaluasi" class="form-control" placeholder="Alasan">
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">4. Apakah anda memiliki kendaraan bermotor?</label>
        <select name="kendaraan" id="kendaraan" class="form-select">
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>

      <div id="detailKendaraan" style="display: none;">
        <div class="mb-3">
          <label class="form-label">Mobil</label>
          <input type="text" class="form-control" name="mobil"
            placeholder="Jenis, merk, tahun, jumlah, status kepemilikan">
        </div>
        <div class="mb-3">
          <label class="form-label">Motor</label>
          <input type="text" class="form-control" name="motor"
            placeholder="Jenis, merk, tahun, jumlah, status kepemilikan">
        </div>
        <span class="text-muted">* Sebutkan jenis, merk, tahun, jumlah, serta status kepemilikan (milik sendiri/milik
          orang
          tua/kredit)</span>
      </div>

      <div class="mb-3">
        <label class="form-label">5. Apakah anda memiliki handphone Android?</label>
        <select name="android" id="android" class="form-select">
          <option value="Tidak">Tidak</option>
          <option value="Ya">Ya</option>
        </select>
      </div>
      <div id="detailAndroid" style="display: none;">
        <input type="text" name="tipe_android" class="form-control" placeholder="Tipe Handphone">
      </div>

      <div>
        <label class="form-label">6. Referensi dan rekomendasi tentang anda dapat kami peroleh dari:</label>
        <span class="text-muted">*) Wajib diisi, referensi bukan dari orang tua</span>
        <div id="referensiList">
          <div class="referensi-item mb-3">
            <input type="text" class="form-control mb-2" name="nama_rekom[]" placeholder="Nama">
            <input type="text" class="form-control mb-2" name="alamat_rekom[]" placeholder="Alamat">
            <input type="text" class="form-control mb-2" name="telepon_rekom[]" placeholder="No. Telepon">
            <input type="text" class="form-control mb-2" name="jabatan_rekom[]" placeholder="Jabatan">
            <input type="text" class="form-control mb-2" name="hubungan_rekom[]" placeholder="Hubungan dengan anda">
          </div>
        </div>
        <button type="button" id="tambahReferensi">Tambah Referensi</button>
      </div>
      <div>
        <label class="form-label">7. Bersedia Mengikuti Masa Kontrak?</label>
        <select name="kontrak" id="kontrak" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
        <textarea name="alasan" id="alasan_kontrak" class="form-control mt-2" placeholder="Alasan"
          style="display: none;"></textarea>
      </div>

      <div>
        <label class="form-label">8. Siap ditugaskan di cabang lain / luar kota sewaktu-waktu?</label>
        <select name="cabang" id="cabang" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
        <textarea name="alasan" id="alasan_cabang" class="form-control mt-2" placeholder="Alasan"
          style="display: none;"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">9. Apakah anda siap untuk menunda pernikahan selama masa kontrak masih
          berjalan?</label>
        <select name="tunda_pernikahan" id="tunda_pernikahan" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
        <textarea name="alasan_tunda_pernikahan" id="alasan_tunda_pernikahan" class="form-control mt-2"
          placeholder="Alasan" style="display: none;"></textarea>
      </div>

      <!-- Pertanyaan 10 -->
      <div class="mb-3">
        <label class="form-label">10. Apakah anda bersedia untuk menjaminkan Ijazah Asli selama 1 tahun?</label>
        <select name="jaminan_ijazah" id="jaminan_ijazah" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
        <textarea name="alasan_jaminan" id="alasan_jaminan" class="form-control mt-2" placeholder="Alasan"
          style="display: none;"></textarea>
      </div>

      <!-- Pertanyaan 11 -->
      <div class="mb-3">
        <label class="form-label">11. Apakah anda bersedia untuk tidak membawa, membocorkan, atau menyebarluaskan data
          milik
          perusahaan?</label>
        <select name="kerahasiaan" id="kerahasiaan" class="form-select">
          <option value="Ya">Ya</option>
          <option value="Tidak">Tidak</option>
        </select>
        <textarea name="alasan_kerahasiaan" id="alasan_kerahasiaan" class="form-control mt-2" placeholder="Alasan"
          style="display: none;"></textarea>
      </div>

      <!-- Pertanyaan 12 -->
      <div class="mb-3">
        <label class="form-label">12. Jelaskan secara singkat harapan, visi, dan misi anda ke depan apabila diterima di
          perusahaan ini:</label>
        <textarea name="visi_misi" id="visi_misi" class="form-control"
          placeholder="Tulis harapan, visi, dan misi anda di sini"></textarea>
      </div>
      <button type="button" class="btn btn-secondary w-100 mb-2"
        onclick="prevStep('lain-lain', 'organisasi')">Back</button>
      <button type="submit" class="btn btn-success w-100">Kirim</button>
    </fieldset>
  </form>
</div>
</div>

<script>
function nextStep(current, next) {
  document.getElementById(current).classList.add('d-none');
  document.getElementById(next).classList.remove('d-none');
}

function prevStep(current, prev) {
  document.getElementById(current).classList.add('d-none');
  document.getElementById(prev).classList.remove('d-none');
}
</script>
<script>
function toggleFamilyTable() {
  var status = document.getElementById("statusMarital").value;
  document.getElementById("marriedSection").style.display = (status === "Menikah" || status === "Duda" || status ===
    "Janda") ? "block" : "none";
  document.getElementById("singleSection").style.display = (status === "Belum Menikah") ? "block" : "none";
}

function addChild(tableId) {
  var table = document.getElementById(tableId).getElementsByTagName('tbody')[0];
  var newRow = table.insertRow();

  // Nama atribut name sesuai dengan kolom tabel
  var columnNames = ["nama_anak", "gender_anak", "usia_anak", "pendidikan_anak", "pekerjaan_anak",
    "status_pernikahan_anak"
  ];
  var columns = ["Anak", "", "", "", "", "", "", "<button type='button' onclick='deleteRow(this)'>Hapus</button>"];

  for (var i = 0; i < columns.length; i++) {
    var cell = newRow.insertCell(i);

    if (i === 0) {
      cell.innerText = columns[i]; // Isi kolom pertama (Keterangan)
    } else if (i === columns.length - 1) {
      cell.innerHTML = columns[i]; // Tombol hapus
    } else {
      var input = document.createElement("input");
      input.type = (i === 3) ? "number" : "text"; // Kolom usia menggunakan type number
      input.className = "form-control";
      input.name = columnNames[i - 1] + "[]"; // Menambahkan atribut name dengan array format

      cell.appendChild(input);
    }
  }
}

function deleteRow(button) {
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

document.addEventListener('click', function(event) {
  if (event.target.classList.contains('btn-remove')) {
    event.target.closest('tr').remove();
  }
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $("#addFormExp").click(function() {
    let formClone = $(".form-experience").first().clone();
    formClone.find("input, textarea").val("");
    formClone.appendTo("#formContainer");
  });

  $(document).on("click", ".remove-btn", function() {
    if ($(".form-experience").length > 1) {
      $(this).closest(".form-experience").remove();
    } else {
      alert("Minimal harus ada satu form pengalaman kerja!");
    }
  });
});

$(document).ready(function() {
  $("#addOrg").click(function() {
    let newForm = $(".org-form").first().clone();
    newForm.find("input").val(""); // Kosongkan inputan
    $("#organisasiContainer").append(newForm);
  });

  $(document).on("click", ".remove-btn-org", function() {
    if ($(".org-form").length > 1) {
      $(this).closest(".org-form").remove();
    } else {
      alert("Minimal harus ada satu form organisasi!");
    }
  });
});
$(document).ready(function() {
  $("#kacamata").change(function() {
    if ($(this).val() === "Ya") {
      $("#detailKacamata").slideDown();
    } else {
      $("#detailKacamata").slideUp();
    }
  });
});
$(document).ready(function() {
  $("#penyakit").change(function() {
    if ($(this).val() === "Ya") {
      $("#detailPenyakit").slideDown();
    } else {
      $("#detailPenyakit").slideUp();
    }
  });
});
$(document).ready(function() {
  $("#psikologi").change(function() {
    if ($(this).val() === "Ya") {
      $("#detailPsikologi").slideDown();
    } else {
      $("#detailPsikologi").slideUp();
      $("#alasanEvaluasi").slideUp();
    }
  });
  $("#evaluasi_psikologi").change(function() {
    if ($(this).val() === "Tidak") {
      $("#alasanEvaluasi").slideDown();
    } else {
      $("#alasanEvaluasi").slideUp();
    }
  });
});
$(document).ready(function() {
  $("#kendaraan").change(function() {
    if ($(this).val() === "Ya") {
      $("#detailKendaraan").slideDown();
    } else {
      $("#detailKendaraan").slideUp();
    }
  });
});
$(document).ready(function() {
  $("#android").change(function() {
    if ($(this).val() === "Ya") {
      $("#detailAndroid").slideDown();
    } else {
      $("#detailAndroid").slideUp();
    }
  });
});
$(document).ready(function() {
  $("#tambahReferensi").click(function() {
    let referensiHtml = `
                    <div class="referensi-item mb-3">
                       <input type="text" name="referensi_nama[]" class="form-control mb-2" placeholder="Nama">
                        <input type="text" name="referensi_alamat[]" class="form-control mb-2" placeholder="Alamat">
                        <input type="text" name="referensi_telepon[]" class="form-control mb-2" placeholder="No. Telepon">
                        <input type="text" name="referensi_jabatan[]" class="form-control mb-2" placeholder="Jabatan">
                        <input type="text" name="referensi_hubungan[]" class="form-control mb-2" placeholder="Hubungan">
                        <button type="button" class="btn btn-danger btn-sm removeReferensi">Hapus</button>
                    </div>
                `;
    $("#referensiList").append(referensiHtml);
  });

  // Event delegation untuk menghapus referensi
  $("#referensiList").on("click", ".removeReferensi", function() {
    $(this).closest(".referensi-item").remove();
  });
});
$(document).ready(function() {
  $("#kontrak").change(function() {
    if ($(this).val() === "Tidak") {
      $("#alasan").show();
    } else {
      $("#alasan").hide();
    }
  });
});
$(document).ready(function() {
  $("#cabang").change(function() {
    if ($(this).val() === "Tidak") {
      $("#alasan_cabang").show();
    } else {
      $("#alasan_cabang").hide();
    }
  });
});
$(document).ready(function() {
  function toggleTextarea(selectId, textareaId) {
    $("#" + selectId).change(function() {
      if ($(this).val() === "Tidak") {
        $("#" + textareaId).show();
      } else {
        $("#" + textareaId).hide();
      }
    });
  }
  toggleTextarea("tunda_pernikahan", "alasan_tunda_pernikahan");
  toggleTextarea("jaminan_ijazah", "alasan_jaminan");
  toggleTextarea("kerahasiaan", "alasan_kerahasiaan");
});

document.addEventListener("DOMContentLoaded", function() {
  const kursusTable = document.getElementById("kursusTable").getElementsByTagName("tbody")[0];
  const addKursusRowBtn = document.getElementById("add-kursus-row");

  addKursusRowBtn.addEventListener("click", function() {
    const newRow = document.createElement("tr");
    newRow.innerHTML = `
            <td><input type="text" class="form-control" name="jenis_kursus[]"></td>
            <td><input type="number" class="form-control" name="tahun_kursus[]"></td>
            <td><input type="number" class="form-control" name="lama_kursus[]"></td>
            <td><input type="text" class="form-control" name="ijazah_kursus[]"></td>
            <td><input type="text" class="form-control" name="dibiayai_oleh[]"></td>
            <td><button type="button" class="btn btn-danger btn-remove">Hapus</button></td>
        `;
    kursusTable.appendChild(newRow);
  });

  kursusTable.addEventListener("click", function(event) {
    if (event.target.classList.contains("btn-remove")) {
      const row = event.target.closest("tr");
      if (row) {
        row.remove();
      }
    }
  });
});

function validateNIK(input) {
  input.value = input.value.replace(/\D/g, ''); // Hanya angka
  const errorText = document.getElementById("nik-error");

  if (input.value.length > 16) {
    input.value = input.value.slice(0, 16);
  }

  if (input.value.length !== 16) {
    errorText.textContent = "NIK harus berupa angka 16 digit!";
  } else {
    errorText.textContent = "";
  }
}

$(document).ready(function() {
  // Ketika provinsi dipilih
  $("#provinsi").change(function() {
    let provinsiKode = $(this).val();
    if (provinsiKode) {
      $("#kabupaten_box").show(); // Tampilkan Kabupaten
      $.post("<?= base_url('wilayah/getKabupaten'); ?>", {
        provinsiKode: provinsiKode
      }, function(data) {
        $("#kabupaten").html('<option value="">Pilih Kabupaten</option>');
        $.each(data, function(index, value) {
          $("#kabupaten").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kabupaten_box, #kecamatan_box, #kelurahan_box").hide();
      $("#kabupaten, #kecamatan, #kelurahan").html('<option value="">Pilih</option>');
    }
  });

  // Ketika kabupaten dipilih
  $("#kabupaten").change(function() {
    let kabupatenKode = $(this).val();
    if (kabupatenKode) {
      $("#kecamatan_box").show(); // Tampilkan Kecamatan
      $.post("<?= base_url('wilayah/getKecamatan'); ?>", {
        kabupatenKode: kabupatenKode
      }, function(data) {
        $("#kecamatan").html('<option value="">Pilih Kecamatan</option>');
        $.each(data, function(index, value) {
          $("#kecamatan").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kecamatan_box, #kelurahan_box").hide();
      $("#kecamatan, #kelurahan").html('<option value="">Pilih</option>');
    }
  });

  // Ketika kecamatan dipilih
  $("#kecamatan").change(function() {
    let kecamatanKode = $(this).val();
    if (kecamatanKode) {
      $("#kelurahan_box").show(); // Tampilkan Kelurahan
      $.post("<?= base_url('wilayah/getKelurahan'); ?>", {
        kecamatanKode: kecamatanKode
      }, function(data) {
        $("#kelurahan").html('<option value="">Pilih Kelurahan</option>');
        $.each(data, function(index, value) {
          $("#kelurahan").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kelurahan_box").hide();
      $("#kelurahan").html('<option value="">Pilih</option>');
    }
  });
});
$(document).ready(function() {
  // Ketika provinsi dipilih
  $("#provinsi_ortu").change(function() {
    let provinsiKode = $(this).val();
    if (provinsiKode) {
      $("#kabupaten_box_ortu").show(); // Tampilkan Kabupaten
      $.post("<?= base_url('wilayah/getKabupaten'); ?>", {
        provinsiKode: provinsiKode
      }, function(data) {
        $("#kabupaten_ortu").html('<option value="">Pilih Kabupaten</option>');
        $.each(data, function(index, value) {
          $("#kabupaten_ortu").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kabupaten_box_ortu, #kecamatan_box_ortu, #kelurahan_box_ortu").hide();
      $("#kabupaten_ortu, #kecamatan_ortu, #kelurahan_ortu").html('<option value="">Pilih</option>');
    }
  });

  // Ketika kabupaten dipilih
  $("#kabupaten_ortu").change(function() {
    let kabupatenKode = $(this).val();
    if (kabupatenKode) {
      $("#kecamatan_box_ortu").show(); // Tampilkan Kecamatan
      $.post("<?= base_url('wilayah/getKecamatan'); ?>", {
        kabupatenKode: kabupatenKode
      }, function(data) {
        $("#kecamatan_ortu").html('<option value="">Pilih Kecamatan</option>');
        $.each(data, function(index, value) {
          $("#kecamatan_ortu").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kecamatan_box_ortu, #kelurahan_box_ortu").hide();
      $("#kecamatan_ortu, #kelurahan_ortu").html('<option value="">Pilih</option>');
    }
  });

  // Ketika kecamatan dipilih
  $("#kecamatan_ortu").change(function() {
    let kecamatanKode = $(this).val();
    if (kecamatanKode) {
      $("#kelurahan_box_ortu").show(); // Tampilkan Kelurahan
      $.post("<?= base_url('wilayah/getKelurahan'); ?>", {
        kecamatanKode: kecamatanKode
      }, function(data) {
        $("#kelurahan_ortu").html('<option value="">Pilih Kelurahan</option>');
        $.each(data, function(index, value) {
          $("#kelurahan_ortu").append('<option value="' + value.kode + '">' + value.nama + '</option>');
        });
      }, "json");
    } else {
      $("#kelurahan_box_ortu").hide();
      $("#kelurahan_ortu").html('<option value="">Pilih</option>');
    }
  });
});
</script>
<?= $this->endSection(); ?>