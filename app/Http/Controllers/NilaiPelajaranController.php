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

        return view('pages.nilai-pelajaran.beri-nilai', compact('kelas', 'siswas', 'mata_pelajaran', 'id_kelas', 'id_matpel'));
    }

    public function tambah($id_kelas, $id_matpel, $id_siswa)
    {
        $nilai_pelajaran = NilaiPelajaran::where('id_siswa', $id_siswa)
            ->where('id_matpel', $id_matpel)
            ->first();

        $nama_kelas = Kelas::find($id_kelas)->nama_kelas;
        $nama_pelajaran = MataPelajaran::find($id_matpel)->nama_pelajaran;
        $nama_siswa = Siswa::find($id_siswa)->nama_siswa;

        $nilai_pelajaran = new NilaiPelajaran();
        return view('pages.nilai-pelajaran.tambah', compact('id_kelas', 'id_matpel', 'id_siswa', 'nilai_pelajaran', 'nama_kelas', 'nama_pelajaran', 'nama_siswa'));
    }

    public function ubah($id_kelas, $id_matpel, $id_siswa, $id_nilai_pelajaran)
    {
        $nilai_pelajaran = NilaiPelajaran::where('id_siswa', $id_siswa)
            ->where('id_matpel', $id_matpel)
            ->first();

        $nama_kelas = Kelas::find($id_kelas)->nama_kelas;
        $nama_pelajaran = MataPelajaran::find($id_matpel)->nama_pelajaran;
        $nama_siswa = Siswa::find($id_siswa)->nama_siswa;


        $uts = $nilai_pelajaran->uts;
        $uas = $nilai_pelajaran->uas;
        $nilai = $nilai_pelajaran->nilai;

        return view('pages.nilai-pelajaran.ubah', compact('id_kelas', 'id_matpel', 'id_siswa', 'nilai_pelajaran', 'nama_kelas', 'nama_pelajaran', 'nama_siswa', 'uts', 'uas', 'nilai', 'id_nilai_pelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uts' => 'nullable|integer|between:0,100',
            'uas' => 'nullable|integer|between:0,100',
            'nilai' => 'nullable|integer|between:0,100',
        ]);

        $data = $request->all();

        NilaiPelajaran::create($data);

        session()->flash('success', 'Data Nilai berhasil ditambah!');

        return redirect()->route('nilai-pelajaran.beri-nilai', ['id_kelas' => $data['id_kelas'], 'id_matpel' => $data['id_matpel']])
            ->with('success', 'Nilai berhasil disimpan.');
    }

    public function perbarui(Request $request, $id_nilai_pelajaran, $id_kelas, $id_matpel)
    {
        $request->validate([
            'uts' => 'nullable|integer|between:0,100',
            'uas' => 'nullable|integer|between:0,100',
            'nilai' => 'nullable|integer|between:0,100',
        ]);

        $data = $request->all();
        $nilai = NilaiPelajaran::findOrFail($id_nilai_pelajaran);
        $nilai->update($data);

        session()->flash('success', 'Data Nilai berhasil diubah!');

        return redirect()->to('/nilai-pelajaran/beri-nilai/' . $id_kelas . '/' . $id_matpel)
            ->with('success', 'Nilai berhasil disimpan.');
    }

    public function hapus($id, $id_kelas, $id_matpel)
    {
        $nilai = NilaiPelajaran::findOrFail($id);
        $nilai->delete();

        session()->flash('danger', 'Data Nilai berhasil dihapus!');
        return redirect()->to('/nilai-pelajaran/beri-nilai/' . $id_kelas . '/' . $id_matpel)
            ->with('danger', 'Nilai berhasil dihapus.');
    }
}
