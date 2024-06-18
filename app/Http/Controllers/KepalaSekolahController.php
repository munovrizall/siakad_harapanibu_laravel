<?php

namespace App\Http\Controllers;

use App\Models\KepalaSekolah;
use App\Http\Requests\StoreKepalaSekolahRequest;
use App\Http\Requests\UpdateKepalaSekolahRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kepala_sekolahs = DB::table('kepala_sekolah')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('nama', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.kepala-sekolah.index', compact('kepala_sekolahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kepala-sekolah.create');
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
        $data['password'] = Hash::make($request->input('password'));
        KepalaSekolah::create($data);

        session()->flash('success', 'Data kepala sekolah berhasil ditambah!');

        return redirect()->route('kepala-sekolah.index');
    }

    public function rules()
    {
        return [
            'nama' => 'required',
            'nip' => 'required|unique:guru',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:guru,email',
            'password' => 'required',
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(KepalaSekolah $kepalaSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kepala_sekolah = KepalaSekolah::findOrFail($id);
        return view('pages.kepala-sekolah.edit', compact('kepala_sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->updateRules($id));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $kepala_sekolah = KepalaSekolah::findOrFail($id);

        $data['email'] = $kepala_sekolah->email;
        $data['password'] = $kepala_sekolah->password;

        $kepala_sekolah->update($data);

        session()->flash('success', 'Data kepala sekolah berhasil diubah!');
        return redirect()->route('kepala-sekolah.index');
    }

    public function updateRules($id)
    {
        return [
            'nama' => 'required',
            'nip' => 'required|unique:guru,nip,' . $id,
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data guru
        $kepala_sekolah = KepalaSekolah::findOrFail($id);
    
        // Temukan user dengan email yang sama dengan email kepala_sekolah yang akan dihapus
        $user = KepalaSekolah::where('email', $kepala_sekolah->email)->first();
    
        // Hapus data kepala_sekolah
        $kepala_sekolah->delete();
        // Jika user ditemukan, hapus juga data user
        if ($user) {
            $user->delete();
        }
    
        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data kepala sekolah berhasil dihapus!');
        return redirect()->route('kepala-sekolah.index');
    }
}
