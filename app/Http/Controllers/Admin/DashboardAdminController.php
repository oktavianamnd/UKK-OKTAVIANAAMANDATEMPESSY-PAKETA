<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;

class DashboardAdminController extends Controller
{
    public function index(){
        $me = auth()->guard('petugas')->user();
        $masyarakat = Masyarakat::count();
        $pengaduan = Pengaduan::count();
        $petugas = Petugas::count();
        $tanggap = Pengaduan::where('status', 'selesai')->count();
        $belumTanggap = Pengaduan::where('status', 'proses')->count();
        return view('admin.dashboard', compact('me', 'masyarakat', 'petugas', 'pengaduan', 'tanggap', 'belumTanggap'));

    }
}
