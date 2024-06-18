<?php

namespace Database\Seeders;

use App\Models\KepalaSekolah;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KepalaSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KepalaSekolah::create([
            'nip' => '103923091212',
            'nama' => 'Budi',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Ir. H. Juanda',
            'no_telepon' => '081289321293',
            'email' => 'budi@email.com',
            'password' => Hash::make('budi'),
        ]);

    }
}
