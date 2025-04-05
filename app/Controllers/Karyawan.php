<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\WilayahModel;
use App\Models\KaryawanModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Karyawan extends BaseController
{
    public function index()
    {
        //
    }

    public function calonKaryawan()
    {
        $karyawanModel = new KaryawanModel();
        $data = $karyawanModel->findAll();
        foreach ($data as &$karyawan) {
            $lamar = json_decode($karyawan['lamaran'], true); 
            $karyawan['posisi'] = [
                'applied_position' => $lamar['applied_position'] ?? null,
                'expected_salary' => $lamar['expected_salary'] ?? null
            ];
        }
        return view('karyawan/calon-karyawan', compact('data'));
    }
    public function form()
    {
        $wilayah = new WilayahModel();
        $provinsi =  $wilayah->getProvinsi();
        return view('karyawan/form', compact('provinsi'));
    }
    public function getKabupaten()
    {
        $model = new WilayahModel();
        $provinsiKode = $this->request->getPost('provinsiKode');
        $kabupaten = $model->getKabupaten($provinsiKode);
        return $this->response->setJSON($kabupaten);
    }

    public function getKecamatan()
    {
        $model = new WilayahModel();
        $kabupatenKode = $this->request->getPost('kabupatenKode');
        $kecamatan = $model->getKecamatan($kabupatenKode);
        return $this->response->setJSON($kecamatan);
    }

    public function getKelurahan()
    {
        $model = new WilayahModel();
        $kecamatanKode = $this->request->getPost('kecamatanKode');
        $kelurahan = $model->getKelurahan($kecamatanKode);
        return $this->response->setJSON($kelurahan);
    }
    public function save()
    {
        $model = new KaryawanModel();

        $status_marital = $this->request->getPost('status_marital'); // Ambil status pernikahan
    
        $keluarga = [];
    
        if ($status_marital === 'Belum Menikah') {
            // Data Ayah
            $keluarga[] = [
                'keterangan' => 'Ayah',
                'nama' => $this->request->getPost('nama_ayah'),
                'gender' => $this->request->getPost('pw_ayah'),
                'usia' => $this->request->getPost('usia_ayah'),
                'pendidikan' => $this->request->getPost('pendidikan_ayah'),
                'pekerjaan' => $this->request->getPost('pekerjaan_ayah'),
                'status_pernikahan' => $this->request->getPost('status_pernikahan_ayah')
            ];
    
            // Data Ibu
            $keluarga[] = [
                'keterangan' => 'Ibu',
                'nama' => $this->request->getPost('nama_ibu'),
                'gender' => $this->request->getPost('pw_ibu'),
                'usia' => $this->request->getPost('usia_ibu'),
                'pendidikan' => $this->request->getPost('pendidikan_ibu'),
                'pekerjaan' => $this->request->getPost('pekerjaan_ibu'),
                'status_pernikahan' => $this->request->getPost('status_pernikahan_ibu')
            ];
        } else {
            // Data Suami/Istri
            $keluarga[] = [
                'keterangan' => 'Suami/Istri',
                'nama' => $this->request->getPost('nama_suami_istri'),
                'gender' => $this->request->getPost('pw_suami_istri'),
                'usia' => $this->request->getPost('usia_suami_istri'),
                'pendidikan' => $this->request->getPost('pendidikan_suami_istri'),
                'pekerjaan' => $this->request->getPost('pekerjaan_suami_istri'),
                'status_pernikahan' => $this->request->getPost('status_pernikahan_suami_istri')
            ];
        }
    
        // Data Anak (Looping jika ada banyak anak)
        $nama_anak = $this->request->getPost('nama_anak');
        $gender_anak = $this->request->getPost('gender_anak');
        $usia_anak = $this->request->getPost('usia_anak');
        $pendidikan_anak = $this->request->getPost('pendidikan_anak');
        $pekerjaan_anak = $this->request->getPost('pekerjaan_anak');
        $status_pernikahan_anak = $this->request->getPost('status_pernikahan_anak');

        if (!empty($nama_anak)) {
            foreach ($nama_anak as $key => $value) {
                $keluarga[] = [
                    'keterangan' => 'Anak',
                    'nama' => $value,
                    'gender' => $gender_anak[$key] ?? '',
                    'usia' => $usia_anak[$key] ?? '',
                    'pendidikan' => $pendidikan_anak[$key] ?? '',
                    'pekerjaan' => $pekerjaan_anak[$key] ?? '',
                    'status_pernikahan' => $status_pernikahan_anak[$key] ?? ''
                ];
            }
        }

        $request = $this->request->getPost();


    $pendidikan = [];

    // Looping data sebelum masuk ke $data
    if (isset($request['nama_sekolah'])) {
        foreach ($request['nama_sekolah'] as $index => $nama_sekolah) {
            $pendidikan[] = [
                'jenis_sekolah' => $request['jenis_sekolah'][$index] ?? null, // Jika ada jenis sekolah
                'nama_sekolah' => $nama_sekolah,
                'tempat_sekolah' => $request['tempat_sekolah'][$index] ?? null,
                'tahun_masuk' => $request['tahun_masuk'][$index] ?? null,
                'tahun_lulus' => $request['tahun_lulus'][$index] ?? null,
                'berijazah' => $request['berijazah'][$index] ?? null,
            ];
        }
    }
    $kursus = [];

    // Looping data sebelum masuk ke $data
    if (isset($request['jenis_kursus'])) {
        foreach ($request['jenis_kursus'] as $index => $jenis_kursus) {
            $kursus[] = [
                'jenis_kursus' => $jenis_kursus,
                'tahun' => $request['tahun_kursus'][$index] ?? null,
                'lama_kursus' => $request['lama_kursus'][$index] ?? null,
                'ijazah' => $request['ijazah_kursus'][$index] ?? null,
                'dibiayai_oleh' => $request['dibiayai_oleh'][$index] ?? null,
            ];
        }
    }
    $experiences = [];

    // Looping data sebelum masuk ke $data
    if (isset($request['company_name'])) {
        foreach ($request['company_name'] as $index => $company_name) {
            $experiences[] = [
                'company_name' => $company_name,
                'superior_name' => $request['superior_name'][$index] ?? null,
                'position_title' => $request['position_title'][$index] ?? null,
                'company_address' => $request['company_address'][$index] ?? null,
                'work_start_date' => $request['work_start_date'][$index] ?? null,
                'work_end_date' => $request['work_end_date'][$index] ?? null,
                'company_phone' => $request['company_phone'][$index] ?? null,
                'salary_benefits' => $request['salary_benefits'][$index] ?? null,
                'job_description' => $request['job_description'][$index] ?? null,
                'reason_for_leaving' => $request['reason_for_leaving'][$index] ?? null,
            ];
        }
    }
    $organizations = [];

    // Looping data organisasi sebelum masuk ke $data
    if (isset($request['organization_name'])) {
        foreach ($request['organization_name'] as $index => $organization_name) {
            $organizations[] = [
                'organization_name' => $organization_name,
                'organization_type' => $request['organization_type'][$index] ?? null,
                'organization_position' => $request['organization_position'][$index] ?? null,
                'organization_year' => $request['organization_year'][$index] ?? null,
            ];
        }
    }
    $references = [];

    // Looping data referensi sebelum masuk ke $data
    if (isset($request['nama_rekom'])) {
        foreach ($request['nama_rekom'] as $index => $nama) {
            $references[] = [
                'nama' => $nama,
                'alamat' => $request['alamat_rekom'][$index] ?? null,
                'telepon' => $request['telepon_rekom'][$index] ?? null,
                'jabatan' => $request['jabatan_rekom'][$index] ?? null,
                'hubungan' => $request['hubungan_rekom'][$index] ?? null,
            ];
        }
    }
      $data = [
        'nik' => $this->request->getPost('nik'),
        'nama' => $this->request->getPost('nama'),
        'pas_foto' => $this->request->getPost('pas_foto'),
        'alamat' =>json_encode([
            'alamat' => $this->request->getPost('alamat'),
            'rt' => $this->request->getPost('rt'),
            'rw' => $this->request->getPost('rw'),
            'kelurahan' => $this->request->getPost('kelurahan'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kota' => $this->request->getPost('kota'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kode_pos' => $this->request->getPost('kode_pos'),
        ]),
        'alamat_ortu' => json_encode([
            'alamat' => $this->request->getPost('alamat_orang_tua'),
            'rt' => $this->request->getPost('rt_orang_tua'),
            'rw' => $this->request->getPost('rw_orang_tua'),
            'kelurahan' => $this->request->getPost('kelurahan_orang_tua'),
            'kecamatan' => $this->request->getPost('kecamatan_orang_tua'),
            'kota' => $this->request->getPost('kota_orang_tua'),
            'provinsi' => $this->request->getPost('provinsi_orang_tua'),
            'kode_pos' => $this->request->getPost('kode_pos_orang_tua'),
        ]),
        'identitas' =>json_encode([
            'no_ktp' => $this->request->getPost('no_ktp'),
            'no_sim_a_b1_b2' => $this->request->getPost('no_sim_a_b1_b2'),
            'no_sim_c' => $this->request->getPost('no_sim_c'),
            'no_jamsostek' => $this->request->getPost('no_jamsostek'),
            'no_npwp' => $this->request->getPost('no_npwp'),
            'no_rekening' => $this->request->getPost('no_rekening'),
            'bank' => $this->request->getPost('bank'),
            'cabang_bank' => $this->request->getPost('cabang_bank'),
            'no_hp' => $this->request->getPost('no_hp'),
        ]),
        'status_rumah' => $this->request->getPost('status_rumah'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'warga_negara' => $this->request->getPost('warga_negara'),
        'suku_bangsa' => $this->request->getPost('suku_bangsa'),
        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        'usia_tahun' => $this->request->getPost('usia_tahun'),
        'usia_bulan' => $this->request->getPost('usia_bulan'),
        'agama' => $this->request->getPost('agama'),
        'golongan_darah' => $this->request->getPost('golongan_darah'),
        'tinggi_badan' => $this->request->getPost('tinggi_badan'),
        'berat_badan' => $this->request->getPost('berat_badan'),
        'warna_kulit' => $this->request->getPost('warna_kulit'),
        'ciri_khusus' => $this->request->getPost('ciri_khusus'),
        'status_marital' => $this->request->getPost('status_marital'),
        'status_keluarga' => $this->request->getPost('status_keluarga'),
        'keluarga' => json_encode($keluarga),
        'pendidikan' => json_encode($pendidikan),
        'kursus' => json_encode($kursus),
        'bahasa' => json_encode([
            'bahasa_nasional' => $this->request->getPost('bahasa_nasional'),
            'bahasa_daerah' => $this->request->getPost('bahasa_daerah'),
            'status_bahasa_daerah' => $this->request->getPost('status_bahasa_daerah'),
            'bahasa_asing' => $this->request->getPost('bahasa_asing'),
            'status_bahasa_asing' => $this->request->getPost('status_bahasa_asing'),
        ]),
        'pendidikan_luar_negeri' => $this->request->getPost('pendidikan_luar_negeri'),
        'beasiswa' => $this->request->getPost('beasiswa'),
        'pengalaman' => json_encode($experiences),
        'lamaran' => json_encode([
            'applied_position' => $this->request->getPost('applied_position'),
            'expected_salary' => $this->request->getPost('expected_salary'),
            'benefits_option' => $this->request->getPost('benefits_option'),
        ]),
        'hobi' => $this->request->getPost('hobi'),
        'organisasi' => json_encode($organizations),
        'kacamata' => json_encode([
            'kacamata' => $this->request->getPost('kacamata'),
            'jenis_kacamata' => $this->request->getPost('jenis_kacamata') ?? null,
            'sejak_kapan' => $this->request->getPost('sejak_kapan') ?? null,
        ]),
        'penyakit' => json_encode([
            'penyakit' => $this->request->getPost('penyakit'),
            'tahun_penyakit' => $this->request->getPost('tahun_penyakit') ?? null,
            'lama_penyakit' => $this->request->getPost('lama_penyakit') ?? null,
            'diagnosa' => $this->request->getPost('diagnosa') ?? null,
            'tempat_rawat' => $this->request->getPost('tempat_rawat') ?? null,
        ]),
        'psikologi' =>json_encode([
            'psikologi' => $this->request->getPost('psikologi'),
            'tahun_psikologi' => $this->request->getPost('tahun_psikologi') ?? null,
            'lama_psikologi' => $this->request->getPost('lama_psikologi') ?? null,
            'diagnosa' => $this->request->getPost('diagnosa_psikologi') ?? null,
            'tempat_rawat' => $this->request->getPost('tempat_rawat_psikologi') ?? null,
            'evaluasi' => $this->request->getPost('evaluasi_psikologi') ?? null,
            'alasan_evaluasi' => $this->request->getPost('alasan_evaluasi') ?? null,
        ]),
        'kendaraan' => json_encode([
            'kendaraan' => $this->request->getPost('kendaraan'),
            'mobil' => $this->request->getPost('mobil') ?? null,
            'motor' => $this->request->getPost('motor') ?? null,
        ]),
        'handphone' => json_encode([
            'android' => $this->request->getPost('android'),
            'tipe_android' => $this->request->getPost('tipe_android') ?? null,
        ]),
        'rekomendasi' => json_encode($references),
        'kontrak' => json_encode([
            'kontrak' => $this->request->getPost('kontrak'),
            'alasan_kontrak' => $this->request->getPost('alasan_kontrak') ?? null,
        ]),
        'cabang' => json_encode([
            'cabang' => $this->request->getPost('cabang'),
            'alasan_cabang' => $this->request->getPost('alasan_cabang') ?? null,
        ]),
        'tunda_pernikahan' => json_encode([
            'tunda_pernikahan' => $this->request->getPost('tunda_pernikahan'),
            'alasan_tunda' => $this->request->getPost('alasan_tunda_pernikahan') ?? null,
        ]),
        'jaminan_ijazah' => json_encode([
            'jaminan_ijazah' => $this->request->getPost('jaminan_ijazah'),
            'alasan_jaminan' => $this->request->getPost('alasan_jaminan_ijazah') ?? null,
        ]),
        'kerahasiaan' => json_encode([
            'kerahasiaan' => $this->request->getPost('kerahasiaan'),
            'alasan_kerahasiaan' => $this->request->getPost('alasan_kerahasiaan') ?? null,
        ]),
        'visi_misi' => $this->request->getPost('visi_misi')

      ];
      $file = $this->request->getFile('pas_foto');
        if (!$file || !$file->isValid()) {
            return $this->failValidationErrors($file ? $file->getErrorString() : 'File tidak ditemukan');
        }
        // Simpan file ke folder uploads
        $newName = $file->getRandomName();
        $file->move('uploads/pas_foto', $newName);
        $data['pas_foto'] = $newName;
        $model->insert($data);

        return redirect()->to('/karyawan/calon-karyawan')->with('success', 'Data berhasil disimpan');
    }
    public function exportPdf($id)
    {
        $model = new KaryawanModel();
        $karyawan = $model->find($id);
        $alamat = json_decode($karyawan['alamat'], true);
        $alamat_ortu = json_decode($karyawan['alamat_ortu'], true);
        $wilayah = new WilayahModel();
        $alamat['kelurahan'] = $wilayah->where('kode', $alamat['kelurahan'])->first();
        $alamat['kecamatan'] = $wilayah->where('kode', $alamat['kecamatan'])->first();
        $alamat['kota'] = $wilayah->where('kode', $alamat['kota'])->first();
        $alamat['provinsi'] = $wilayah->where('kode', $alamat['provinsi'])->first();
        $alamat_ortu['kelurahan'] = $wilayah->where('kode', $alamat_ortu['kelurahan'])->first();
        $alamat_ortu['kecamatan'] = $wilayah->where('kode', $alamat_ortu['kecamatan'])->first();
        $alamat_ortu['kota'] = $wilayah->where('kode', $alamat_ortu['kota'])->first();
        $alamat_ortu['provinsi'] = $wilayah->where('kode', $alamat_ortu['provinsi'])->first();


        if (!$karyawan) {
            return redirect()->to('/karyawan')->with('error', 'Data tidak ditemukan');
        }

        // Load library Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        // Load view sebagai HTML
        $html = view('karyawan/pdf_template', ['karyawan' => $karyawan, 'alamat' =>$alamat, 'alamat_ortu' => $alamat_ortu]);

        // Render PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Outputkan ke browser
        $dompdf->stream("data_karyawan_{$id}.pdf", ["Attachment" => false]);
    }
}