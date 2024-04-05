<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;

class AdminHomeController extends Controller
{

    public function index()
    {
        $totalSiswa = Siswa::count();
        $totalKelas = Kelas::count();
        $totalGuru = Guru::count();
        $totalAdmin = User::where('roles', 'ADMIN')->count();
        return view('pages.admin.admin-home', compact('totalSiswa', 'totalKelas', 'totalGuru', 'totalAdmin'));
    }
}
