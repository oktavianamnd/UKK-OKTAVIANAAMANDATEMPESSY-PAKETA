<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $me = auth()->guard('petugas')->user();
        $masyarakat = Masyarakat::count();
        $pengaduan = Pengaduan::count();
        $petugas = Petugas::count();
        $belumTanggap = Pengaduan::where('status', '0')->count();
        $prosesTanggap = Pengaduan::where('status', 'proses')->count();
        $tanggap = Pengaduan::where('status', 'selesai')->count();
        return view('admin.dashboard', compact('me', 'masyarakat', 'petugas', 'pengaduan', 'belumTanggap', 'prosesTanggap', 'tanggap'));
    }
}
