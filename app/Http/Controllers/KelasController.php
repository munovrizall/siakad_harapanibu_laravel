<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelases = Kelas::when($request->input('name'), function ($query, $name) {
            return $query->where('nama_kelas', 'like', '%' . $name . '%');
        })
            ->paginate(10);
        return view('pages.admin.kelas.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();

        return view('pages.admin.kelas.create', compact('jurusans'));
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
        Kelas::create($data);

        session()->flash('success', 'Data kelas berhasil ditambah!');

        return redirect()->route('kelas.index');
    }

    public function rules()
    {
        return [
            'nama_kelas' => 'required',
            'id_jurusan' => 'required',
            'kapasitas' => 'required',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        return view('pages.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::all(); 
        return view('pages.admin.kelas.edit', compact('kelas', 'jurusans'));
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
        $kelas = Kelas::findOrFail($id);
        $kelas->update($data);

        session()->flash('success', 'Data kelas berhasil diubah!');
        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data kelas
        $kelas = Kelas::findOrFail($id);

        // Hapus data kelas
        $kelas->delete();

        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data kelas berhasil dihapus!');
        return redirect()->route('kelas.index');
    }
}
