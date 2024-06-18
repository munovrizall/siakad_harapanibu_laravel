<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AkunPenggunaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\JadwalPelajaranGuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\LaporanPenilaianController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiPelajaranController;
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
    Route::resource('home', HomeController::class);
    Route::get('/laporan-penilaian/cetak-pdf', [LaporanPenilaianController::class, 'pdf'])->name('laporan-penilaian.cetak-pdf');
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('akun', AkunPenggunaController::class);
    Route::resource('kepala-sekolah', KepalaSekolahController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('mata-pelajaran', MataPelajaranController::class);
    Route::resource('jadwal-pelajaran', JadwalPelajaranController::class);
    Route::get('jadwal-pelajaran/tambah/{id_kelas}', [JadwalPelajaranController::class, 'tambah'])->name('jadwal-pelajaran.tambah');
    Route::get('jadwal-pelajaran/ubah/{id_kelas}/{id}', [JadwalPelajaranController::class, 'ubah'])->name('jadwal-pelajaran.ubah');
});

Route::group(['middleware' => ['role:guru']], function () {
    Route::resource('jadwal-mengajar', JadwalPelajaranGuruController::class);
    Route::resource('nilai-pelajaran', NilaiPelajaranController::class);
    Route::get('nilai-pelajaran/beri-nilai/{id_kelas}/{id_matpel}', [NilaiPelajaranController::class, 'beriNilai'])->name('nilai-pelajaran.beri-nilai');
    Route::get('nilai-pelajaran/beri-nilai/ubah/{id_kelas}/{id_matpel}/{id_siswa}/{id_nilai_pelajaran}', [NilaiPelajaranController::class, 'ubah'])->name('nilai-pelajaran.ubah');
    Route::get('nilai-pelajaran/beri-nilai/tambah/{id_kelas}/{id_matpel}/{id_siswa}', [NilaiPelajaranController::class, 'tambah'])->name('nilai-pelajaran.tambah');
    Route::put('/nilai-pelajaran/perbarui/{id}/{id_kelas}/{id_matpel}', [NilaiPelajaranController::class, 'perbarui'])->name('nilai-pelajaran.perbarui');
    Route::delete('/nilai-pelajaran/hapus/{id}/{id_kelas}/{id_matpel}', [NilaiPelajaranController::class, 'hapus'])->name('nilai-pelajaran.hapus');

});

Route::group(['middleware' => ['role:siswa']], function () {
    Route::resource('laporan-penilaian', LaporanPenilaianController::class);
});
