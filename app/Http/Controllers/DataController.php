<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index() {
        $data = Data::all();
        return view('dashboard', compact('data'));
    }
    public function store(Request $request) {
        $request->validate([
            'type' => 'required',
            'link' => 'nullable',
            'file' => 'nullable',
            'video' => 'nullable'
        ]);
        $data = ['type' => $request->type];
        
        if ($request->hasFile('file') && $request->type === 'file') {
            $data['file'] = $request->file('file')->store('materi/files', 'public');
        }
        
        if ($request->hasFile('video') && $request->type === 'video') {
            $data['video'] = $request->file('video')->store('materi/videos', 'public');
        }
        
        if ($request->type === 'link') {
            $data['link'] = $request->link;
        }

        Data::create($data);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
    }
}