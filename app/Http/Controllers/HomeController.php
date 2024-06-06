<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalGuru = Guru::count();
        $totalJurusan = Jurusan::count();
        // $totalAdmin = User::where('roles', 'ADMIN')->count();
        return view('pages.home', compact('totalSiswa', 'totalKelas', 'totalGuru', 'totalJurusan'));
    }
}
