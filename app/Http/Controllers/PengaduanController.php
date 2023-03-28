<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PengaduanController extends Controller
{
    public function create()
    {
        $pengaduan = route('riwayat');
        $laporan = [
            [
                'nomor' => 1,
                'isi' => 'Isi laporan harus diisi dan pastikan laporan tersebut bukan laporan palsu.'
            ],
            [
                'nomor' => 2,
                'isi' => 'Jika ingin mengisi laporan, anda harus mengirim bukti foto untuk laporan tersebut. Bukti foto harus berupa png atau jpg.'
            ],
            [
                'nomor' => 3,
                'isi' => 'Jika anda mengisi kategori laporan publik, laporan akan dipublikasikan di halaman <a href="'.$pengaduan.'">Semua Laporan</a> dan semua orang bisa melihat laporan anda.'
            ],
            [
                'nomor' => 4,
                'isi' => 'Jika anda mengisi kategori laporan sebagai privasi, laporan tidak akan dipublikasikan dihalaman <a href="'.$pengaduan.'">Semua Laporan</a> dan hanya anda yang dapat melihat laporan tersebut.'
            ],
        ];
        return view('masyarakat.create', compact('laporan'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'isi_laporan' => 'required',
            'kategori' => 'required',
            'foto' => 'required|mimes:png,jpg',
        ]);
        $file_name = time() . '_' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path("img/pengaduan"), $file_name);
        Pengaduan::create([
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $file_name,
            'kategori' => $request->kategori,
            'tgl_pengaduan' => now()
        ]);

        return redirect()->route('dashboard');
    }

    public function show()
    {
       $data = Pengaduan::where('kategori', 'publik')->paginate(8);
       return view('masyarakat.dataRiwayat')->with([
        'pengaduan' => $data
       ]);
    }

    public function update(Request $request, $id){
        $data = Pengaduan::where('id_pengaduan', $id)->firstOrFail();
        try {
            $data->update([
                'kategori' => $request->kategori,
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            return back();
        }
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
