<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $gurus = DB::table('guru')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('nama_guru', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.admin.guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.guru.create');
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
        Guru::create($data);

        session()->flash('success', 'Data guru berhasil ditambah!');

        return redirect()->route('guru.index');
    }

    public function rules()
    {
        return [
            'nama_guru' => 'required',
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
    public function show(Guru $guru)
    {
        return view('pages.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('pages.admin.guru.edit', compact('guru'));
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
        $guru = Guru::findOrFail($id);

        $data['email'] = $guru->email;
        $data['password'] = $guru->password;

        $guru->update($data);

        session()->flash('success', 'Data guru berhasil diubah!');
        return redirect()->route('guru.index');
    }

    public function updateRules($id)
    {
        return [
            'nama_guru' => 'required',
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
        $guru = Guru::findOrFail($id);
    
        // Temukan user dengan email yang sama dengan email guru yang akan dihapus
        $user = User::where('email', $guru->email)->first();
    
        // Hapus data guru
        $guru->delete();
        // Jika user ditemukan, hapus juga data user
        if ($user) {
            $user->delete();
        }
    
        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data guru berhasil dihapus!');
        return redirect()->route('guru.index');
    }
}
