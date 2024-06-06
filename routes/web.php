<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AkunPenggunaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('admin-home', function () {
    //     return view('pages.admin.admin-home');
    // })->name('admin-home');
    
    Route::resource('home', HomeController::class);
    Route::resource('akun', AkunPenggunaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('mata-pelajaran', MataPelajaranController::class);
    Route::resource('jadwal-pelajaran', JadwalPelajaranController::class);
    Route::get('jadwal-pelajaran/tambah/{id_kelas}', [JadwalPelajaranController::class, 'tambah'])->name('jadwal-pelajaran.tambah');
    Route::get('jadwal-pelajaran/ubah/{id_kelas}/{id}', [JadwalPelajaranController::class, 'ubah'])->name('jadwal-pelajaran.ubah');
});

