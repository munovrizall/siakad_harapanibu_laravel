<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jurusans = DB::table('jurusan')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('nama_jurusan', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jurusan.create');
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
        Jurusan::create($data);

        session()->flash('success', 'Data jurusan berhasil ditambah!');

        return redirect()->route('jurusan.index');
    }

    public function rules()
    {
        return [
            'nama_jurusan' => 'required',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        return view('pages.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('pages.jurusan.edit', compact('jurusan'));
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
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($data);

        session()->flash('success', 'Data jurusan berhasil diubah!');
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data jurusan
        $jurusan = Jurusan::findOrFail($id);
    
        // Hapus data jurusan
        $jurusan->delete();
    
        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data jurusan berhasil dihapus!');
        return redirect()->route('jurusan.index');
    }
}
