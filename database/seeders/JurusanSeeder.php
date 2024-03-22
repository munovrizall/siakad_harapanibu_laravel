<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'IPA',
        ]);
        
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'IPS',
        ]);
    }
}
