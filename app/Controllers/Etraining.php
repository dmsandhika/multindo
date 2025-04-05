<?php

namespace App\Controllers;

use App\Models\TopikModel;
use App\Models\VideoModel;
use App\Models\MateriModel;
use App\Models\KomentarModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Etraining extends BaseController
{
    public function materi()
    {
        $materi = new MateriModel();
        $data = $materi->findAll();
        $title = 'Materi';
        return view('etraining/materi/index', compact('title', 'data'));
    }
    public function formMateri()
    {
        $title = 'Form Materi';
        return view('etraining/materi/form', compact('title'));
    }
    public function uploadMateri(){
        $model = new MateriModel();
        $file = $this->request->getFile('file');
        
        if (!$file || !$file->isValid()) {
            return $this->failValidationErrors($file ? $file->getErrorString() : 'File tidak ditemukan');
        }
        // Simpan file ke folder uploads
        $newName = $file->getRandomName();
        $file->move('uploads/materi', $newName);
        
        // Simpan data ke database
        $data = [
            'nama' => $this->request->getPost('nama'),
            'file' => $newName
        ];
        
        $model->insert($data);

        return redirect()->to('/e-training/materi');
    }

    public function video()
    {
        $materi = new VideoModel();
        $data = $materi->findAll();
        $title = 'Video';
        return view('etraining/video/index', compact('title', 'data'));
    }

    public function formVideo()
    {
        $title = 'Form Video';
        return view('etraining/video/form', compact('title'));
    }

    public function uploadVideo(){
        $model = new VideoModel();
        $file = $this->request->getFile('file');
        
        if (!$file || !$file->isValid()) {
            return $this->failValidationErrors($file ? $file->getErrorString() : 'File tidak ditemukan');
        }
        // Simpan file ke folder uploads
        $newName = $file->getRandomName();
        $file->move('uploads/video', $newName);
        
        // Simpan data ke database
        $data = [
            'nama' => $this->request->getPost('nama'),
            'file' => $newName
        ];
        
        $model->insert($data);

        return redirect()->to('/e-training/video');
    }

    public function diskusi()
    {
        $topik = new TopikModel();
        $data = $topik->findAll();
        return view('etraining/diskusi-umum/index', compact('data'));
    }
    public function  formDiskusi()
    {
        return view('etraining/diskusi-umum/form');
    }
    public function saveDiskusi()
    {
        $topik = new TopikModel();
        $data = [
            'judul' => $this->request->getPost('judul')
        ];
        $topik->insert($data);
        return redirect()->to('/e-training/diskusi-umum');
    }
    public function detailDiskusi($id){
        $topik = new TopikModel();
        $komentar = new KomentarModel();
        $data = $topik->find($id);
        $komentar = $komentar->where('topik_id', $data['id'])->findAll();
        return view('etraining/diskusi-umum/detail', compact('data','komentar'));
    }

    public function tambahKomentar(){
        $komentar = new KomentarModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'topik_id' => $this->request->getPost('topik_id'),
            'komentar' => $this->request->getPost('komentar')
        ];
        $komentar->insert($data);
        return redirect()->to('/e-training/diskusi-umum/'.$data['topik_id']);
    }
}