<?php

namespace App\Http\Controllers\Admin;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::get();
        return view('admin.masyarakat.index')->with([
            'masyarakats' => $masyarakat
        ]);
    }
    public function create()
    {
        return view('admin.masyarakat.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required',
            'username' => 'required|unique:petugas,username|unique:masyarakat,username',
            'password' => 'required',
            'telp' => 'required|numeric'
        ]);

        Masyarakat::insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);

        return redirect()->route('admin.masyarakat.index')->with('success', 'berhasil menambah petugas');
    }

    public function destroy($id)
    {
        $data = Masyarakat::where('nik', $id)->firstorFail();
        $data->delete();
        return redirect()->route('admin..index')->with('success', 'Data petugas berhasil terhapus');
    }
}
