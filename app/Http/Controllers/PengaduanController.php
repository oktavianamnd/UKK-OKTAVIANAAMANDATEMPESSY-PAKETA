<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = pengaduan::get();
        return view('masyarakat.dashboard')->with([
            'pengaduans' => $pengaduan
        ]);
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required|mimes:png,jpg',
        ]);
        $file_name = time() . '_' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path("img/pengaduan"), $file_name);
        Pengaduan::create([
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $file_name,
            'tgl_pengaduan' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function show()

    {

        $data = Pengaduan::get()->where('akses', '=', 'public' && 'nik', '=', Auth::user()->nik);

        return view('masyarakat.dataRiwayat', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function destroy(Request $request, $id)
    {
        $data = Pengaduan::where('id_pengaduan', $id)->first();
        if ($data) {
            if ($data->status == '0') {
                $path = public_path('img/pengaduan/' . $data->foto);
                if (File::exists($path)) {
                    FIle::delete($path);
                }
                $data->delete();
                return redirect()->route('dashboard')->with('success');
            }
            return redirect()->route('dashboard')->with('failed');
        }
        return redirect()->route('dashboard')->with('failed');
    }
}
