<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\NilaiPelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\JadwalPelajaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Subquery untuk mendapatkan unique combination dari id_matpel dan id_kelas
        $jadwal_pelajarans = DB::table('jadwal_pelajaran')
            ->select(DB::raw('MIN(id) as id'))
            ->groupBy('id_matpel', 'id_kelas');

        // Query utama untuk mendapatkan data lengkap dari jadwal_pelajarans yang terfilter oleh subquery
        $jadwal_pelajarans = JadwalPelajaran::with('matpel')
            ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id')
            ->whereIn('jadwal_pelajaran.id', $jadwal_pelajarans)
            ->orderBy('kelas.nama_kelas')
            ->paginate(10);

        return view('pages.laporan-akademik.index', compact('jadwal_pelajarans'));
    }

    public function lihatNilai($id_kelas, $id_matpel)
    {
        $kelas = Kelas::find($id_kelas);
        $siswas = Siswa::select(
            'siswa.id as siswa_id',
            'siswa.nama_siswa',
            'kelas.id as kelas_id',
            'kelas.nama_kelas',
            'nilai_pelajaran.id as id_nilai_pelajaran',
            'nilai_pelajaran.id_matpel',
            'nilai_pelajaran.uts',
            'nilai_pelajaran.uas',
            'nilai_pelajaran.nilai'
        )
            ->leftJoin('nilai_pelajaran', function ($join) use ($id_matpel) {
                $join->on('siswa.id', '=', 'nilai_pelajaran.id_siswa')
                    ->where('nilai_pelajaran.id_matpel', $id_matpel);
            })
            ->join('kelas', 'kelas.id', '=', 'siswa.id_kelas')
            ->where('kelas.id', $id_kelas)
            ->orderBy('siswa.nama_siswa', 'asc')
            ->get();


        $mata_pelajaran = MataPelajaran::find($id_matpel);
        $user = Auth::user();
        $guru = $user->guru;

        return view('pages.laporan-akademik.lihat-nilai', compact('kelas', 'siswas', 'mata_pelajaran', 'id_kelas', 'id_matpel'));
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
