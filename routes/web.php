<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PengaduanController as Ngadu;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('landing');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');
Route::get('register', function () {
    return view('auth.register');
})->name('register');;

Route::post('authenticate', [AuthUserController::class, 'authenticate'])->name('authenticate');
Route::post('register/store', [AuthUserController::class, 'register'])->name('register.store');
Route::get('logout', [AuthUserController::class, 'logout'])->name('logout');

Route::middleware('auth:masyarakat')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('masyarakat/create', [PengaduanController::class, 'create'])->name('masyarakat.create');
    Route::post('masyarakat/store', [PengaduanController::class, 'store'])->name('masyarakat.store');
    Route::delete('pengaduan/destroy/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
});

Route::prefix('webmin')->name('admin.')->group(function () {
    Route::get('login', [AuthAdminController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthAdminController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth:petugas')->group(function () {
        Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
        Route::get('edit', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::resource('webmin/petugas', PetugasController::class);
        Route::resource('/masyarakat', MasyarakatController::class);

        Route::prefix('pengaduan')->name('pengaduan.')->group(function () {
            Route::get('/', [Ngadu::class, 'index'])->name('index');
            Route::get('/tanggapi/{id}', [Ngadu::class, 'edit'])->name('edit');
            Route::put('/tanggapan/{id}', [Ngadu::class, 'update'])->name('tanggapan');
        });
        Route::get('tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
        Route::get('tanggapan-detail/{id}', [TanggapanController::class, 'show'])->name('tanggapan.show');

        Route::middleware(['admin'])->group(function () {
            Route::get('pengaduan/print', [Ngadu::class, 'print'])->name('pengaduan.print');
        });
    });
});
