<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateNilaiPelajaranSeeder extends Seeder
{
    public function run()
    {
        // Ambil semua data dari tabel nilai_pelajaran
        $nilaiPelajarans = DB::table('nilai_pelajaran')->get();

        foreach ($nilaiPelajarans as $nilaiPelajaran) {
            // Ambil id_kelas dari tabel siswa berdasarkan id_siswa
            $siswa = DB::table('siswa')->where('id', $nilaiPelajaran->id_siswa)->first();

            if ($siswa) {
                // Update nilai_pelajaran dengan id_kelas yang sesuai
                DB::table('nilai_pelajaran')
                    ->where('id', $nilaiPelajaran->id)
                    ->update(['id_kelas' => $siswa->id_kelas]);
            }
        }
    }
}
