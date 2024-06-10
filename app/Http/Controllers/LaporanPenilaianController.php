<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\NilaiPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        $nilai_pelajarans = $siswa->nilaiPelajaran()->with('mataPelajaran', 'kelas')->get();

        return view('pages.laporan-penilaian.index', compact('siswa', 'nilai_pelajarans'));
    }

    public function pdf()
    {
        $user = Auth::user();
        $siswa = $user->siswa;
        $nilai_pelajarans = $siswa->nilaiPelajaran()->with('mataPelajaran', 'kelas')->get();

        foreach ($nilai_pelajarans as $nilai_pelajaran) {
            $nilai_pelajaran->predikat = $this->getPredikat($nilai_pelajaran->nilai);
        }
        $kelas = Kelas::findOrFail($siswa->id_kelas);
        $pdf = Pdf::loadView('pages.laporan-penilaian.pdf', compact('siswa', 'nilai_pelajarans', 'kelas'));

        return $pdf->stream();
    }

    public function getPredikat($nilai)
    {
        if ($nilai > 80) {
            return 'A';
        } elseif ($nilai > 70) {
            return 'B';
        } elseif ($nilai > 60) {
            return 'C';
        } else {
            return 'D';
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NilaiPelajaran $nilaiPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiPelajaran $nilaiPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiPelajaran $nilaiPelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiPelajaran $nilaiPelajaran)
    {
        //
    }
}
