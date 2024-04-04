<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $siswas = DB::table('siswa')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('nama_siswa', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('pages.admin.siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelases = Kelas::all();
        return view('pages.admin.siswa.create', compact('kelases'));
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
        Siswa::create($data);

        session()->flash('success', 'Data siswa berhasil ditambah!');

        return redirect()->route('siswa.index');
    }

    public function rules()
    {
        return [
            'nama_siswa' => 'required',
            'nis' => 'required|unique:siswa',
            'id_kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:siswa,email',
            'password' => 'required',
        ];
    }
    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('pages.home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelases = Kelas::all();
        $siswa = Siswa::findOrFail($id);
        return view('pages.admin.siswa.edit', compact('siswa', 'kelases'));
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
        $siswa = Siswa::findOrFail($id);

        $data['email'] = $siswa->email;
        $data['password'] = $siswa->password;

        $siswa->update($data);

        session()->flash('success', 'Data siswa berhasil diubah!');
        return redirect()->route('siswa.index');
    }

    public function updateRules($id)
    {
        return [
            'nama_siswa' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $id,
            'id_kelas' => 'required',
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
        // Temukan data siswa
        $siswa = Siswa::findOrFail($id);
    
        // Temukan user dengan email yang sama dengan email siswa yang akan dihapus
        $user = User::where('email', $siswa->email)->first();
    
        // Hapus data siswa
        $siswa->delete();
        // Jika user ditemukan, hapus juga data user
        if ($user) {
            $user->delete();
        }
    
        // Setelah penghapusan, kembalikan ke halaman yang sesuai
        session()->flash('danger', 'Data siswa berhasil dihapus!');
        return redirect()->route('siswa.index');
    }
}
