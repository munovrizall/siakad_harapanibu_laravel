<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::find(2);
        $siswas = Siswa::where('id_kelas', $kelas->id)->get();

        dd($siswas);
    }
}
