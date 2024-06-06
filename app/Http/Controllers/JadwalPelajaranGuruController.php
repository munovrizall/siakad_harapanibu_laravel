<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalPelajaranGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $guru = $user->guru;

        $query = JadwalPelajaran::with('matpel', 'kelas')
            ->where('id_guru', $guru->id);

        if ($request->has('name')) {
            $search = $request->input('name');
            $query->whereHas('matpel', function ($q) use ($search) {
                $q->where('nama_pelajaran', 'like', '%' . $search . '%');
            });
        }

        $jadwal_pelajarans = $query
            ->orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')")
            ->orderBy('jam_mulai')
            ->paginate(10);

        return view('pages.jadwal-pelajaran-guru.index', compact('jadwal_pelajarans', 'guru'));
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
    public function show(JadwalPelajaran $jadwalPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalPelajaran $jadwalPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalPelajaran $jadwalPelajaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalPelajaran $jadwalPelajaran)
    {
        //
    }
}
