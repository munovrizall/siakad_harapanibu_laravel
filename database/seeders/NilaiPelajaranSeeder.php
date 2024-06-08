<?php

namespace Database\Seeders;

use App\Models\NilaiPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $existingCombinations = NilaiPelajaran::select('id_siswa', 'id_matpel')
            ->get()
            ->map(function ($item) {
                return $item->id_siswa . '-' . $item->id_matpel;
            })
            ->toArray();

        $newData = [];
        for ($i = 0; $i < 600; $i++) {
            do {
                $data = [
                    'id_siswa' => fake()->numberBetween(1, 200),
                    'id_matpel' => fake()->numberBetween(1, 15),
                    'uts' => fake()->numberBetween(1, 100),
                    'uas' => fake()->numberBetween(1, 100),
                    'nilai' => fake()->numberBetween(1, 100),
                ];
                $combination = $data['id_siswa'] . '-' . $data['id_matpel'];
            } while (in_array($combination, $existingCombinations));

            $existingCombinations[] = $combination;
            $newData[] = $data;
        }

        NilaiPelajaran::insert($newData);
    }
}
