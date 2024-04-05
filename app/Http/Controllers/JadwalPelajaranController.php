<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JadwalPelajaran;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $kelases = Kelas::when($request->input('name'), function ($query, $name) {
            return $query->where('nama_kelas', 'like', '%' . $name . '%');
        })
            ->withCount('siswa')
            ->paginate(10);
        return view('pages.admin.jadwal-pelajaran.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah($id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);

        $kelases = Kelas::all();
        $pelajarans = MataPelajaran::all();
        $gurus = Guru::all();

        return view('pages.admin.jadwal-pelajaran.create', compact('kelas', 'kelases', 'id_kelas', 'pelajarans', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        JadwalPelajaran::create($data);

        session()->flash('success', 'Data jadwal kelas berhasil ditambah!');
        $id_kelas = $request->id_kelas;

        return redirect()->route('jadwal-pelajaran.show', $id_kelas);
    }

    public function rules()
    {
        return [
            'id_matpel' => 'required',
            'id_guru' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        $jadwal_pelajarans = JadwalPelajaran::where('id_kelas', $kelas->id)
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->orderBy('jam_mulai')
            ->paginate(10);

        return view('pages.admin.jadwal-pelajaran.show', compact('kelas', 'jadwal_pelajarans'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function ubah($id_kelas, $id)
    {
        $jadwal_pelajaran = JadwalPelajaran::findOrFail($id);
        $kelas = Kelas::findOrFail($id_kelas);

        $kelases = Kelas::all();
        $pelajarans = MataPelajaran::all();
        $gurus = Guru::all();
        return view('pages.admin.jadwal-pelajaran.edit', compact('jadwal_pelajaran', 'kelas', 'pelajarans', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $jadwal_pelajaran = JadwalPelajaran::findOrFail($id);
        $jadwal_pelajaran->update($data);

        session()->flash('success', 'Data jadwal berhasil diubah!');
        return redirect()->route('jadwal-pelajaran.show', $jadwal_pelajaran->id_kelas);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal_pelajaran = JadwalPelajaran::findOrFail($id);
        $jadwal_pelajaran->delete();

        session()->flash('danger', 'Data jadwal berhasil dihapus!');
        return redirect()->route('jadwal-pelajaran.show', $jadwal_pelajaran->id_kelas);
    }
}
