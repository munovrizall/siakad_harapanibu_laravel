<?php

use App\Http\Controllers\AkunPenggunaController;
use App\Http\Controllers\GuruController;
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
    Route::get('home', function () {
        return view('pages.home');
    })->name('home');
    
    Route::resource('akun', AkunPenggunaController::class);
    Route::resource('guru', GuruController::class);
});

Route::get('/data-guru', function () {
    return view('data-guru');
});

Route::get('/data-siswa', function () {
    return view('data-siswa');
});

Route::get('/mata-pelajaran', function () {
    return view('mata-pelajaran');
});

Route::get('/jadwal-pelajaran', function () {
    return view('jadwal-pelajaran');
});

Route::get('/nilai-pelajaran', function () {
    return view('nilai-pelajaran');
});
