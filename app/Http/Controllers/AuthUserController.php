<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Masyarakat;

class AuthUserController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors([
            'username' => 'Invalid username or password'
        ])->onlyInput('username');
    }

    public function register(Request $request){
        $validator = $request->validate([
            'nik' => 'required|digits:16|unique:masyarakat,username',
            'nama' => 'required',
            'username' => 'required|string|max:25',
            'password' => 'required|string|max:30',
            'telp' => 'required|digits_between:8,13'
        ]);

        $validator['password'] = Hash::make($request->password);
        Masyarakat::insert($validator);
        return redirect()->route('login')->with('success', 'Registrasi berhasil');
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        }
        elseif (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
            return redirect()->route('admin.login');
        }
        else {
            return redirect()->route('login');
        }
    }
}
