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

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .logo {
    width: 100px;
    /* Sesuaikan ukuran logo */
    height: auto;
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

  <img src="<?= base_url('image/logo.png') ?>" class="logo">
  <div class="d-flex justify-content-between">
    <img src="./image/logo.png" alt="Logo">
    <img src="/uploads/<?= $karyawan['pas_foto'] ?>" alt="Pas Foto">
  </div>
  <h2>Data Karyawan</h2>
  <h3>1. Data Diri</h3>
  <table border="0">
    <tr>
      <th>NIK</th>
      <td>: <?= $karyawan['nik'] ?></td>
    </tr>
    <tr>
      <th>Nama</th>
      <td>: <?= $karyawan['nama'] ?></td>
    </tr>
    <tr>
      <th>Alamat</th>
      <td>: <?= json_decode($karyawan['alamat'], true)['alamat'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>RT</th>
      <td>: <?= json_decode($karyawan['alamat'], true)['rt'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>RW</th>
      <td>: <?= json_decode($karyawan['alamat'], true)['rw'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kelurahan</th>
      <td>: <?= $alamat['kelurahan']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kecamatan</th>
      <td>: <?= $alamat['kecamatan']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kota</th>
      <td>: <?= $alamat['kota']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kode Pos</th>
      <td>: <?= $alamat['kode_pos'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Provinsi</th>
      <td>: <?= $alamat['provinsi']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Alamat Orang Tua</th>
      <td>: <?= $alamat_ortu['alamat'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>RT</th>
      <td>: <?= $alamat_ortu['rt'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>RW</th>
      <td>: <?= $alamat_ortu['rw'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kelurahan</th>
      <td>: <?= $alamat_ortu['kelurahan']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kecamatan</th>
      <td>: <?= $alamat_ortu['kecamatan']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kota</th>
      <td>: <?= $alamat_ortu['kota']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Kode Pos</th>
      <td>: <?= $alamat_ortu['kode_pos'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>Provinsi</th>
      <td>: <?= $alamat_ortu['provinsi']['nama'] ?? '-' ?></td>
    </tr>
    <tr>
      <th>No. KTP</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_ktp']??'-'?></td>
    </tr>
    <tr>
      <th>No SIM A/B1/B2</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_sim_a_b1_b2']??'-'?></td>
    </tr>
    <tr>
      <th>No SIM C</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_sim_c']??'-'?></td>
    </tr>
    <tr>
      <th>No. Jamsostek</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_jamsostek']??'-'?></td>
    </tr>
    <tr>
      <th>No. NPWP</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_npwp']??'-'?></td>
    </tr>
    <tr>
      <th>No. Rekening Tabungan</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_rekening']??'-'?></td>
    </tr>
    <tr>
      <th>Bank</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['bank']??'-'?></td>
    </tr>
    <tr>
      <th>Cabang</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['cabang_bank']??'-'?></td>
    </tr>
    <tr>
      <th>No HP</th>
      <td>: <?= json_decode($karyawan['identitas'],true)['no_hp']??'-'?></td>
    </tr>
    <tr>
      <th>Status Rumah</th>
      <td>: <?= $karyawan['status_rumah'] ?></td>
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td>: <?= $karyawan['jenis_kelamin'] ?></td>
    </tr>
    <tr>
      <th>Warga Negara</th>
      <td>: <?= $karyawan['warga_negara'] ?></td>
    </tr>
    <tr>
      <th>Suku Bangsa</th>
      <td>: <?= $karyawan['suku_bangsa'] ?></td>
    </tr>
    <tr>
      <th>Tempat & Tanggal Lahir</th>
      <td>: <?= $karyawan['tempat_lahir'] . ', ' . $karyawan['tanggal_lahir'] ?></td>
    </tr>
    <tr>
      <th>Usia</th>
      <td>: <?= $karyawan['usia_tahun'] . ' Tahun ' . $karyawan['usia_bulan'] . ' Bulan' ?></td>
    </tr>
    <tr>
      <th>Agama</th>
      <td>: <?= $karyawan['agama'] ?></td>
    </tr>
    <tr>
      <th>Golongan Darah</th>
      <td>: <?= $karyawan['golongan_darah'] ?></td>
    </tr>
    <tr>
      <th>Tinggi Badan</th>
      <td>: <?= $karyawan['tinggi_badan'] ?></td>
    </tr>
    <tr>
      <th>Berat Badan</th>
      <td>: <?= $karyawan['berat_badan'] ?></td>
    </tr>
    <tr>
      <th>Warna Kulit</th>
      <td>: <?= $karyawan['warna_kulit'] ?></td>
    </tr>
    <tr>
      <th>Ciri Khusus</th>
      <td>: <?= $karyawan['ciri_khusus'] ?></td>
    </tr>
    <tr>
      <th>Status Marital</th>
      <td>: <?= $karyawan['status_marital'] ?></td>
    </tr>
    <tr>
      <th>Status Keluarga</th>
      <td>: <?= $karyawan['status_keluarga'] ?></td>
    </tr>
  </table>
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
        <td><?=json_decode($karyawan['bahasa'],true)['bahasa_nasional']??'-' ?></td>
      </tr>
      <tr>
        <td>Bahasa Daerah : <?=  json_decode($karyawan['bahasa'],true)['bahasa_daerah']??'-'?></td>
        <td><?=  json_decode($karyawan['bahasa'],true)['status_bahasa_daerah']??'-'?></td>
      </tr>
      <tr>
        <td>Bahasa Asing : <?=  json_decode($karyawan['bahasa'],true)['bahasa_asing']??'-' ?></td>
        <td><?=  json_decode($karyawan['bahasa'],true)['status_bahasa_asing']??'-'?></td>
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
  <table>
    <tbody>
      <tr>
        <td>Posisi yang dilamar :</td>
        <td><?= json_decode($karyawan['lamaran'],true)['applied_position'] ?></td>
      </tr>
      <tr>
        <td>Ekspektasi Gaji :</td>
        <td><?= json_decode($karyawan['lamaran'],true)['expected_salary'] ?></td>
      </tr>
      <tr>
        <td>Apakah ingin memperoleh tunjangan?</td>
        <td><?= json_decode($karyawan['lamaran'],true)['benefits_option']?></td>
      </tr>
    </tbody>
  </table>

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
      <li>Apakah anda berkacamata? : <?= json_decode($karyawan['kacamata'],true)['kacamata'] ?><br>Jika ya, min/plus/silinder : <?= json_decode($karyawan['kacamata'],true)['jenis_kacamata'] ?><br>Sejak Kapan : <?= json_decode($karyawan['kacamata'],true)['sejak_kapan'] ?></li>
      <li>Apakah anda pernah menderita penyakit berat, sampai harus dirawat di rumah sakit atau menderita sakit yang lama sembuh ? : <?= json_decode($karyawan['penyakit'],true)['penyakit'] ?> <br>Tahun Berapa : <?= json_decode($karyawan['penyakit'],true)['tahun_penyakit'] ?><br> Berapa Lama : <?= json_decode($karyawan['penyakit'],true)['lama_penyakit'] ?> <br> Diagnosa : <?= json_decode($karyawan['penyakit'],true)['diagnosa'] ?> <br> Dirawat Dimana : <?= json_decode($karyawan['penyakit'],true)['tempat_rawat'] ?></li>
      <li>Apakah anda pernah mengikuti evaluasi psikologi / psikotes? : <?= json_decode($karyawan['psikologi'],true)['psikologi'] ?> <br>Tahun Berapa : <?= json_decode($karyawan['psikologi'],true)['tahun_psikologi'] ?> <br> Diagnosa : <?= json_decode($karyawan['psikologi'],true)['diagnosa'] ?> <br> Dirawat Dimana : <?= json_decode($karyawan['psikologi'],true)['keperluan'] ?> <br> Bersediakah anda menjalani evaluasi psikologi dalam seleksi masuk di perusahaan ini? : <?= json_decode($karyawan['psikologi'],true)['evaluasi'] ?>, <?= json_decode($karyawan['psikologi'],true)['alasan_evaluasi'] ?></li>
      <li>Apakah anda memiliki kendaraan bermotor ? : <?=  json_decode($karyawan['kendaraan'],true)['kendaraan'] ?> <br>Mobil : <?= json_decode($karyawan['kendaraan'],true)['mobil'] ?> <br>Motor : <?= json_decode($karyawan['kendaraan'],true)['motor'] ?></li>
      <li>Apakah anda memiliki handphone android ? : <?= json_decode($karyawan['handphone'],true)['android'] ?> <br> Type : <?= json_decode($karyawan['handphone'],true)['tipe_android'] ?></li>
    </ul>
    <p>Referensi dan Rekomendasi  tentang anda  dapat kami peroleh dari :</p>
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
            <li>Apakah anda bersedia mengikuti masa kontrak? : <?= json_decode($karyawan['kontrak'],true)['kontrak'] ?>
                <?php 
                if (json_decode($karyawan['kontrak'],true)['kontrak'] == 'Tidak') {
                    echo 'Alasan : ' . json_decode($karyawan['kontrak'],true)['alasan_kontrak'];
                }
                ?>
            </li>
            <li>Apakah anda siap ditugaskan ke cabang lain/luar kota sewaktu-waktu ? : <?= json_decode($karyawan['cabang'],true)['cabang'] ?>
                <?php 
                if (json_decode($karyawan['cabang'],true)['cabang'] == 'Tidak') {
                    echo 'Alasan : ' . json_decode($karyawan['cabang'],true)['alasan_cabang'];
                } 
                ?>
            </li>
            <li>Apakah anda siap untuk menunda pernikahan selama masa kontrak masih berjalan terhitung sejak menandatangani perjanjian kerja? : <?= json_decode($karyawan['tunda_pernikahan'],true)['tunda_pernikahan'] ?>
                <?php
                if (json_decode($karyawan['tunda_pernikahan'],true)['tunda_pernikahan'] == 'Tidak') {
                    echo 'Alasan : ' . json_decode($karyawan['tunda_pernikahan'],true)['alasan_tunda'];
                } 
                ?>
            </li>
            <li>Apakah anda bersedia untuk menjaminkan Ijazah Asli terhitung sejak menandatangani perjanjian kerja dalam jangka waktu 1 tahun? : <?= json_decode($karyawan['jaminan_ijazah'],true)['jaminan_ijazah'] ?>
                <?php
                if (json_decode($karyawan['jaminan_ijazah'],true)['jaminan_ijazah'] == 'Tidak') {
                    echo 'Alasan : ' . json_decode($karyawan['jaminan_ijazah'],true)['alasan_jaminan'];
                } 
                ?>
            </li>
            <li>Apabila anda telah diterima sebagai karyawan PT. Multindo Auto Finance bersedia untuk tidak membawa, membocorkan, melaporkan dan menyebarluaskan data atau dokumen yang menjadi milik perusahaan? : <?= json_decode($karyawan['kerahasiaan'],true)['kerahasiaan'] ?>
                <?php
                if (json_decode($karyawan['kerahasiaan'],true)['kerahasiaan'] == 'Tidak') {
                    echo 'Alasan : ' . json_decode($karyawan['kerahasiaan'],true)['alasan_kerahasiaan'];
                } 
                ?>
            </li>
            <li>Jelaskan secara singkat harapan, visi dan misi anda ke depan apabila diterima di perusahaan ini: <br>
                <?= $karyawan['visi_misi'] ?></li>
          </ul>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>