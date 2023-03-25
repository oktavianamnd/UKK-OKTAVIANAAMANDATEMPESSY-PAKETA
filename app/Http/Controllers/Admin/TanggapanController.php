<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TanggapanController extends Controller
{
    public function index(){
        $tanggapan = Tanggapan::with('pengaduan', 'petugas')->get();
        return view('admin.tanggapan.index', compact('tanggapan'));
    }

    public function show($id){
        $data = Tanggapan::with('pengaduan', 'petugas')->where('id_tanggapan', $id)->first();
        return view('admin.tanggapan.show', compact('data'));
    }
}
