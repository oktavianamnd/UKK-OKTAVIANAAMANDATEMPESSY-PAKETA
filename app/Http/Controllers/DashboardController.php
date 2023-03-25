<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index(){
        $me = auth()->user();
        $pengaduans = Pengaduan::where('nik', $me->nik)->get();
        return view('masyarakat.dashboard', compact('me', 'pengaduans'));
    }
}
