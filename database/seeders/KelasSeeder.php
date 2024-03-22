<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '10A',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '10B',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '10A',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '10B',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '11A',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '11B',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '11A',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '11B',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '12A',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '12B',
            'id_jurusan' => 1,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '12A',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);

        \App\Models\Kelas::factory()->create([
            'nama_kelas' => '12B',
            'id_jurusan' => 2,
            'kapasitas' => 30,
        ]);
       
    }
}
