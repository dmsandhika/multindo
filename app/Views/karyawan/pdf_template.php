<!DOCTYPE html>
<html>

<head>
  <title>Data Karyawan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
    }


    h2 {
      text-align: center;
      flex-grow: 1;
    }

    .container {
      width: 100%;
      margin: 0 auto;
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
      border: 1px solid #ddd;
    }

    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .data-table td {
      padding: 5px 10px;
      border: 1px solid #ddd;
      vertical-align: top;
      width: 50%;
    }

    .label {
      font-weight: bold;
      margin-right: 5px;
    }
  </style>
</head>

<body>

<?php
$path = FCPATH . 'image/logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
  <div style="float: left; margin-right: 10px;">
    <img src="<?= $base64 ?>" alt="Logo Multindo" style="height: 60px;">
  </div>
<div style="width: 100%; font-family: Arial, sans-serif;">
  <!-- Kiri: Logo dan biodata -->
  <div style="float: left; width: 70%;">
    <div style="overflow: hidden;">
      <h3 style="margin: 0; font-size: 16px;">BIODATA CALON KARYAWAN / KARYAWATI</h3>
      <p style="margin: 0; font-size: 14px;">
        Kesempatan adalah sama tanpa memandang jenis kelamin,<br>
        Suku bangsa, agama, warna kulit, dan keturunan
      </p>
    </div>
  </div>

  <!-- Kanan: Kotak Rahasia, Foto, dan Tanggal -->
  <div style="float: right; width: 28%; text-align: center;">
    <div style="border: 1px solid black; display: inline-block; font-weight: bold; font-size: 12px; padding: 2px 10px; margin-bottom: 5px;">
      RAHASIA
    </div>
    <div style="width: 100px; height: 130px; border: 2px solid black; margin: 5px auto; display: flex; align-items: center; justify-content: center; font-size: 14px;">
      FOTO 3 X 4
    </div>
    <div style="font-size: 14px; margin-top: 5px;">
      TANGGAL :
      <span style="display: inline-block; border: 1px solid #000; padding: 2px 10px; margin: 0 2px;">___</span> /
      <span style="display: inline-block; border: 1px solid #000; padding: 2px 10px; margin: 0 2px;">___</span> /
      <span style="display: inline-block; border: 1px solid #000; padding: 2px 14px; margin: 0 2px;">_____</span>
    </div>
  </div>

  <div style="clear: both;"></div>
</div>

  <h3>1. Data Diri</h3>
  <ul>
    <li><strong>NIK:</strong> <?= $karyawan['nik'] ?></li>
    <li><strong>Nama:</strong> <?= $karyawan['nama'] ?></li>
    <li><strong>Alamat:</strong> <?= json_decode($karyawan['alamat'], true)['alamat'] ?? '-' ?>
      <ul>
        <li><strong>RT:</strong> <?= json_decode($karyawan['alamat'], true)['rt'] ?? '-' ?></li>
        <li><strong>RW:</strong> <?= json_decode($karyawan['alamat'], true)['rw'] ?? '-' ?></li>
        <li><strong>Kelurahan:</strong> <?= $alamat['kelurahan']['nama'] ?? '-' ?></li>
        <li><strong>Kecamatan:</strong> <?= $alamat['kecamatan']['nama'] ?? '-' ?></li>
        <li><strong>Kota:</strong> <?= $alamat['kota']['nama'] ?? '-' ?></li>
        <li><strong>Kode Pos:</strong> <?= $alamat['kode_pos'] ?? '-' ?></li>
        <li><strong>Provinsi:</strong> <?= $alamat['provinsi']['nama'] ?? '-' ?></li>
      </ul>
    </li>
    <li><strong>Alamat Orang Tua:</strong> <?= $alamat_ortu['alamat'] ?? '-' ?>
      <ul>
        <li><strong>RT:</strong> <?= $alamat_ortu['rt'] ?? '-' ?></li>
        <li><strong>RW:</strong> <?= $alamat_ortu['rw'] ?? '-' ?></li>
        <li><strong>Kelurahan:</strong> <?= $alamat_ortu['kelurahan']['nama'] ?? '-' ?></li>
        <li><strong>Kecamatan:</strong> <?= $alamat_ortu['kecamatan']['nama'] ?? '-' ?></li>
        <li><strong>Kota:</strong> <?= $alamat_ortu['kota']['nama'] ?? '-' ?></li>
        <li><strong>Kode Pos:</strong> <?= $alamat_ortu['kode_pos'] ?? '-' ?></li>
        <li><strong>Provinsi:</strong> <?= $alamat_ortu['provinsi']['nama'] ?? '-' ?></li>
      </ul>
    </li>
    <li><strong>No. KTP:</strong> <?= json_decode($karyawan['identitas'], true)['no_ktp'] ?? '-' ?></li>
    <li><strong>No SIM A/B1/B2:</strong> <?= json_decode($karyawan['identitas'], true)['no_sim_a_b1_b2'] ?? '-' ?></li>
    <li><strong>No SIM C:</strong> <?= json_decode($karyawan['identitas'], true)['no_sim_c'] ?? '-' ?></li>
    <li><strong>No. Jamsostek:</strong> <?= json_decode($karyawan['identitas'], true)['no_jamsostek'] ?? '-' ?></li>
    <li><strong>No. NPWP:</strong> <?= json_decode($karyawan['identitas'], true)['no_npwp'] ?? '-' ?></li>
    <li><strong>No. Rekening Tabungan:</strong> <?= json_decode($karyawan['identitas'], true)['no_rekening'] ?? '-' ?></li>
    <li><strong>Bank:</strong> <?= json_decode($karyawan['identitas'], true)['bank'] ?? '-' ?></li>
    <li><strong>Cabang:</strong> <?= json_decode($karyawan['identitas'], true)['cabang_bank'] ?? '-' ?></li>
    <li><strong>No HP:</strong> <?= json_decode($karyawan['identitas'], true)['no_hp'] ?? '-' ?></li>
    <li><strong>Status Rumah:</strong> <?= $karyawan['status_rumah'] ?></li>
    <li><strong>Jenis Kelamin:</strong> <?= $karyawan['jenis_kelamin'] ?></li>
    <li><strong>Warga Negara:</strong> <?= $karyawan['warga_negara'] ?></li>
    <li><strong>Suku Bangsa:</strong> <?= $karyawan['suku_bangsa'] ?></li>
    <li><strong>Tempat & Tanggal Lahir:</strong> <?= $karyawan['tempat_lahir'] . ', ' . $karyawan['tanggal_lahir'] ?></li>
    <li><strong>Usia:</strong> <?= $karyawan['usia_tahun'] . ' Tahun ' . $karyawan['usia_bulan'] . ' Bulan' ?></li>
    <li><strong>Agama:</strong> <?= $karyawan['agama'] ?></li>
    <li><strong>Golongan Darah:</strong> <?= $karyawan['golongan_darah'] ?></li>
    <li><strong>Tinggi Badan:</strong> <?= $karyawan['tinggi_badan'] ?></li>
    <li><strong>Berat Badan:</strong> <?= $karyawan['berat_badan'] ?></li>
    <li><strong>Warna Kulit:</strong> <?= $karyawan['warna_kulit'] ?></li>
    <li><strong>Ciri Khusus:</strong> <?= $karyawan['ciri_khusus'] ?></li>
    <li><strong>Status Marital:</strong> <?= $karyawan['status_marital'] ?></li>
    <li><strong>Status Keluarga:</strong> <?= $karyawan['status_keluarga'] ?></li>
  </ul>

  <h4>Data Keluarga</h4>
  <table border="1">
    <thead>
      <tr>
        <th>Keterangan</th>
        <th>Nama</th>
        <th>P/W</th>
        <th>Usia</th>
        <th>Pendidikan</th>
        <th>Pekerjaan</th>
        <th>Status Pernikahan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $keluarga = json_decode($karyawan['keluarga'], true); // Decode JSON ke array
      if (!empty($keluarga)) {
        foreach ($keluarga as $anggota) {
          echo "<tr>
                        <td>{$anggota['keterangan']}</td>
                        <td>{$anggota['nama']}</td>
                        <td>" . ($anggota['gender'] == 'p' ? 'L' : 'P') . "</td>
                        <td>{$anggota['usia']}</td>
                        <td>{$anggota['pendidikan']}</td>
                        <td>{$anggota['pekerjaan']}</td>
                        <td>{$anggota['status_pernikahan']}</td>
                    </tr>";
        }
      } else {
        echo "<tr><td colspan='7' style='text-align:center;'>Data tidak tersedia</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <h3>2. Pendidikan dan Keterampilan</h3>
  <h4>Formal</h4>
  <table border="1">
    <thead>
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
      <?php
      $pendidikan = json_decode($karyawan['pendidikan'], true);
      $jenis_pendidikan = ['SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'];

      if (!empty($pendidikan)) {
        foreach ($pendidikan as $index => $sekolah) {
          echo "<tr>
                        <td>{$jenis_pendidikan[$index]}</td>
                        <td>{$sekolah['nama_sekolah']}</td>
                        <td>{$sekolah['tempat_sekolah']}</td>
                        <td>{$sekolah['tahun_masuk']}</td>
                        <td>{$sekolah['tahun_lulus']}</td>
                        <td>{$sekolah['berijazah']}</td>
                    </tr>";
        }
      } else {
        echo "<tr><td colspan='6' style='text-align:center;'>Data tidak tersedia</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <h4>Kursus dan Pelatihan</h4>
  <table border="1">
    <thead>
      <tr>
        <th>Jenis Kursus/Pelatihan</th>
        <th>Tahun</th>
        <th>Lama Kursus</th>
        <th>Ijazah/Keterangan</th>
        <th>Dibiayai Oleh</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $kursus = json_decode($karyawan['kursus'], true);

      if (!empty($kursus)) {
        foreach ($kursus as $kursus) {
          echo "<tr>
                        <td>{$kursus['jenis_kursus']}</td>
                        <td>{$kursus['tahun']}</td>
                        <td>{$kursus['lama_kursus']}</td>
                        <td>{$kursus['ijazah']}</td>
                        <td>{$kursus['dibiayai_oleh']}</td>
                    </tr>";
        }
      } else {
        echo "<tr><td colspan='6' style='text-align:center;'>Data tidak tersedia</td></tr>";
      }
      ?>
    </tbody>
  </table>
  <h4>Kemampuan Berbahasa</h4>
  <table border="1">
    <thead>
      <tr>
        <th>Keterangan</th>
        <th>Aktif/Pasif</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Bahasa Nasional : Indonesia</td>
        <td><?= json_decode($karyawan['bahasa'], true)['bahasa_nasional'] ?? '-' ?></td>
      </tr>
      <tr>
        <td>Bahasa Daerah : <?= json_decode($karyawan['bahasa'], true)['bahasa_daerah'] ?? '-' ?></td>
        <td><?= json_decode($karyawan['bahasa'], true)['status_bahasa_daerah'] ?? '-' ?></td>
      </tr>
      <tr>
        <td>Bahasa Asing : <?= json_decode($karyawan['bahasa'], true)['bahasa_asing'] ?? '-' ?></td>
        <td><?= json_decode($karyawan['bahasa'], true)['status_bahasa_asing'] ?? '-' ?></td>
      </tr>
    </tbody>
  </table>
  <h4>Pernahkah Anda bersekolah / mengikuti pendidikan / kursus di luar negeri?<br>Bila
    pernah, sebutkan tahun berapa, dalam bidang apa, gelar yang diperoleh, dan prestasi</h4>
  <span>Jawab : <?= $karyawan['pendidikan_luar_negeri'] ?? '-' ?></span>
  <h4>Pernahkah Anda mendapat beasiswa? Bila pernah, sebutkan tahun berapa, dalam bidang
    apa, gelar apa yang diperoleh, prestasi, dan penyelenggara/pemberi beasiswa</h4>
  <span>Jawab : <?= $karyawan['beasiswa'] ?? '-' ?></span>

  <h3>3. Pengalaman Kerja</h3>
  <?php
  if (!empty($karyawan['pengalaman'])) {
    $pengalaman = json_decode($karyawan['pengalaman'], true);
    foreach ($pengalaman as $exp) {
      echo "<table border='1' cellspacing='0' cellpadding='8' width='100%'>
                <tr>
                    <td>Nama Perusahaan :</td>
                    <td colspan='2'>{$exp['company_name']}</td>
                    <td>Nama Atasan :</td>
                    <td colspan='2'>{$exp['superior_name']}</td>
                </tr>
                <tr>
                    <td>Jabatan :</td>
                    <td colspan='2'>{$exp['position_title']}</td>
                    <td>Alamat Perusahaan :</td>
                    <td colspan='2'>{$exp['company_address']}</td>
                </tr>
                <tr>
                    <td>Masa Kerja :</td>
                    <td colspan='2'>{$exp['work_start_date']} s/d {$exp['work_end_date']}</td>
                    <td>No. Telepon :</td>
                    <td colspan='2'>{$exp['company_phone']}</td>
                </tr>
                <tr>
                    <td colspan='6'>Gaji dan tunjangan yang diterima : Rp. {$exp['salary_benefits']}</td>
                </tr>
                <tr>
                    <td colspan='6'>Deskripsikan pekerjaan yang anda lakukan (ruang lingkup tanggung jawab, membawahi berapa karyawan, bertanggung jawab kepada siapa) :</td>
                </tr>
                <tr>
                    <td colspan='6'>{$exp['job_description']}</td>
                </tr>
                <tr>
                    <td colspan='6'>Bila anda memiliki rencana berhenti, jelaskan alasannya : {$exp['reason_for_leaving']}</td>
                </tr>
            </table><br>";
    }
  }
  ?>
  <h3>4. Bagian yang Dilamar</h3>
  <ul>
  <li><strong>Posisi yang dilamar:</strong> <?= json_decode($karyawan['lamaran'], true)['applied_position'] ?? '-' ?></li>
  <li><strong>Ekspektasi Gaji:</strong> <?= json_decode($karyawan['lamaran'], true)['expected_salary'] ?? '-' ?></li>
  <li><strong>Apakah ingin memperoleh tunjangan?</strong> <?= json_decode($karyawan['lamaran'], true)['benefits_option'] ?? '-' ?></li>
</ul>


  <h3>5. Kegiatan Lainnya</h3>
  <h4>Kegemaran / Hobi</h4>
  <span>Jawab : <?= $karyawan['hobi'] ?? '-' ?></span>
  <table border='1' cellspacing='0' cellpadding='8' width='100%'>
    <thead>
      <tr>
        <th>Nama Organisasi</th>
        <th>Jenis Organisasi</th>
        <th>Tahun</th>
        <th>Jabatan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (!empty($karyawan['organisasi'])) {
        $organisasi = json_decode($karyawan['organisasi'], true);
        foreach ($organisasi as $org) {
          echo "  <tr>
                       <td>{$org['organization_name']}</td>
                       <td>{$org['organization_type']}</td>
                       <td>{$org['organization_year']}</td>
                       <td>{$org['organization_position']}</td>
                   </tr>";
        }
      }
      ?>
    </tbody>
  </table><br>
  <h3>6. Keterangan Lain</h3>
  <l>
    <li>Apakah anda berkacamata? : <?= json_decode($karyawan['kacamata'], true)['kacamata'] ?><br>Jika ya, min/plus/silinder : <?= json_decode($karyawan['kacamata'], true)['jenis_kacamata'] ?><br>Sejak Kapan : <?= json_decode($karyawan['kacamata'], true)['sejak_kapan'] ?></li>
    <li>Apakah anda pernah menderita penyakit berat, sampai harus dirawat di rumah sakit atau menderita sakit yang lama sembuh ? : <?= json_decode($karyawan['penyakit'], true)['penyakit'] ?> <br>Tahun Berapa : <?= json_decode($karyawan['penyakit'], true)['tahun_penyakit'] ?><br> Berapa Lama : <?= json_decode($karyawan['penyakit'], true)['lama_penyakit'] ?> <br> Diagnosa : <?= json_decode($karyawan['penyakit'], true)['diagnosa'] ?> <br> Dirawat Dimana : <?= json_decode($karyawan['penyakit'], true)['tempat_rawat'] ?></li>
    <li>Apakah anda pernah mengikuti evaluasi psikologi / psikotes? : <?= json_decode($karyawan['psikologi'], true)['psikologi'] ?> <br>Tahun Berapa : <?= json_decode($karyawan['psikologi'], true)['tahun_psikologi'] ?> <br> Diagnosa : <?= json_decode($karyawan['psikologi'], true)['diagnosa'] ?> <br> Dirawat Dimana : <?= json_decode($karyawan['psikologi'], true)['keperluan'] ?> <br> Bersediakah anda menjalani evaluasi psikologi dalam seleksi masuk di perusahaan ini? : <?= json_decode($karyawan['psikologi'], true)['evaluasi'] ?>, <?= json_decode($karyawan['psikologi'], true)['alasan_evaluasi'] ?></li>
    <li>Apakah anda memiliki kendaraan bermotor ? : <?= json_decode($karyawan['kendaraan'], true)['kendaraan'] ?> <br>Mobil : <?= json_decode($karyawan['kendaraan'], true)['mobil'] ?> <br>Motor : <?= json_decode($karyawan['kendaraan'], true)['motor'] ?></li>
    <li>Apakah anda memiliki handphone android ? : <?= json_decode($karyawan['handphone'], true)['android'] ?> <br> Type : <?= json_decode($karyawan['handphone'], true)['tipe_android'] ?></li>
    </ul>
    <p>Referensi dan Rekomendasi tentang anda dapat kami peroleh dari :</p>
    <table border='1' cellspacing='0' cellpadding='8' width='100%'>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat dan Nomer Telepon</th>
          <th>Jabatan</th>
          <th>Hubungan dengan Anda</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!empty($karyawan['rekomendasi'])) {
          $rekomendasi = json_decode($karyawan['rekomendasi'], true);
          foreach ($rekomendasi as $rek) {
            echo "  <tr>
                       <td>{$rek['nama']}</td>
                       <td>{$rek['alamat']}  - {$rek['telepon']}</td>
                       <td>{$rek['jabatan']}</td>
                       <td>{$rek['hubungan']}</td>
                   </tr>";
          }
        }
        ?>
      </tbody>
    </table> <br>
    <l>
      <li>Apakah anda bersedia mengikuti masa kontrak? : <?= json_decode($karyawan['kontrak'], true)['kontrak'] ?>
        <?php
        if (json_decode($karyawan['kontrak'], true)['kontrak'] == 'Tidak') {
          echo 'Alasan : ' . json_decode($karyawan['kontrak'], true)['alasan_kontrak'];
        }
        ?>
      </li>
      <li>Apakah anda siap ditugaskan ke cabang lain/luar kota sewaktu-waktu ? : <?= json_decode($karyawan['cabang'], true)['cabang'] ?>
        <?php
        if (json_decode($karyawan['cabang'], true)['cabang'] == 'Tidak') {
          echo 'Alasan : ' . json_decode($karyawan['cabang'], true)['alasan_cabang'];
        }
        ?>
      </li>
      <li>Apakah anda siap untuk menunda pernikahan selama masa kontrak masih berjalan terhitung sejak menandatangani perjanjian kerja? : <?= json_decode($karyawan['tunda_pernikahan'], true)['tunda_pernikahan'] ?>
        <?php
        if (json_decode($karyawan['tunda_pernikahan'], true)['tunda_pernikahan'] == 'Tidak') {
          echo 'Alasan : ' . json_decode($karyawan['tunda_pernikahan'], true)['alasan_tunda'];
        }
        ?>
      </li>
      <li>Apakah anda bersedia untuk menjaminkan Ijazah Asli terhitung sejak menandatangani perjanjian kerja dalam jangka waktu 1 tahun? : <?= json_decode($karyawan['jaminan_ijazah'], true)['jaminan_ijazah'] ?>
        <?php
        if (json_decode($karyawan['jaminan_ijazah'], true)['jaminan_ijazah'] == 'Tidak') {
          echo 'Alasan : ' . json_decode($karyawan['jaminan_ijazah'], true)['alasan_jaminan'];
        }
        ?>
      </li>
      <li>Apabila anda telah diterima sebagai karyawan PT. Multindo Auto Finance bersedia untuk tidak membawa, membocorkan, melaporkan dan menyebarluaskan data atau dokumen yang menjadi milik perusahaan? : <?= json_decode($karyawan['kerahasiaan'], true)['kerahasiaan'] ?>
        <?php
        if (json_decode($karyawan['kerahasiaan'], true)['kerahasiaan'] == 'Tidak') {
          echo 'Alasan : ' . json_decode($karyawan['kerahasiaan'], true)['alasan_kerahasiaan'];
        }
        ?>
      </li>
      <li>Jelaskan secara singkat harapan, visi dan misi anda ke depan apabila diterima di perusahaan ini: <br>
        <?= $karyawan['visi_misi'] ?></li>
      </ul>

      <div style="width: 100%; margin-top: 80px; font-family: Arial, sans-serif;">
  <div style="float: right; border: 1px solid black; width: 100px; height: 60px; padding: 10px; text-align: center;">
    <div style="border-bottom: 1px solid black; padding-bottom: 40px;"></div>
    <div style="margin-top: 5px;"><?= $karyawan['nama'] ?></div>
  </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>