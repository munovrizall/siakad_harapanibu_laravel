<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mata_pelajarans = DB::table('mata_pelajaran')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('nama_pelajaran', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.admin.mata-pelajaran.index', compact('mata_pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.mata-pelajaran.create');
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
        MataPelajaran::create($data);

        session()->flash('success', 'Data mata pelajaran berhasil ditambah!');

        return redirect()->route('mata-pelajaran.index');
    }

    public function rules()
    {
        return [
            'nama_pelajaran' => 'required',
            'kkm' => 'required',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mata_pelajaran)
    {
        return view('pages.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mata_pelajaran = MataPelajaran::findOrFail($id);
        return view('pages.admin.mata-pelajaran.edit', compact('mata_pelajaran'));
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
        $mata_pelajaran = MataPelajaran::findOrFail($id);
        $mata_pelajaran->update($data);

        session()->flash('success', 'Data mata pelajaran berhasil diubah!');
        return redirect()->route('mata-pelajaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data mata_pelajaran
        $mata_pelajaran = MataPelajaran::findOrFail($id);
    
        // Hapus data mata_pelajaran
        $mata_pelajaran->delete();
    
        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data mata pelajaran berhasil dihapus!');
        return redirect()->route('mata-pelajaran.index');
    }
}
