<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\NilaiPelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NilaiPelajaranController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $guru = $user->guru;

        // Subquery untuk mendapatkan unique combination dari id_matpel dan id_kelas
        $jadwal_pelajarans = DB::table('jadwal_pelajaran')
            ->select(DB::raw('MIN(id) as id'))
            ->where('id_guru', $guru->id)
            ->groupBy('id_matpel', 'id_kelas');

        // Query utama untuk mendapatkan data lengkap dari jadwal_pelajarans yang terfilter oleh subquery
        $jadwal_pelajarans = JadwalPelajaran::with('matpel')
            ->join('kelas', 'jadwal_pelajaran.id_kelas', '=', 'kelas.id')
            ->whereIn('jadwal_pelajaran.id', $jadwal_pelajarans)
            ->orderBy('kelas.nama_kelas')
            ->paginate(10);

        return view('pages.nilai-pelajaran.index', compact('jadwal_pelajarans'));
    }

    public function beriNilai($id_kelas, $id_matpel)
    {
        $kelas = Kelas::find($id_kelas);
        $siswas = Siswa::where('id_kelas', $kelas->id)
        ->join('nilai_pelajaran', 'nilai_pelajaran.id_siswa', '=', 'siswa.id')
        ->orderBy('nama_siswa')
        ->toSql();

        dd($siswas);
        
        $mata_pelajaran = MataPelajaran::find($id_matpel);
        $user = Auth::user();
        $guru = $user->guru;

        return view('pages.nilai-pelajaran.beri-nilai', compact('kelas', 'siswas', 'mata_pelajaran'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $guru = $user->guru;

        $request->validate([
            'id_siswa' => 'required|exists:siswa,id',
            'id_matpel' => 'required|exists:mata_pelajaran,id',
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        NilaiPelajaran::create([
            'id_guru' => $guru->id,
            'id_siswa' => $request->id_siswa,
            'id_matpel' => $request->id_matpel,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('penilaian.show', $request->id_matpel)->with('success', 'Nilai berhasil disimpan.');
    }
}
