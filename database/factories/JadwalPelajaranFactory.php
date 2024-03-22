<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalPelajaran>
 */
class JadwalPelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kelas' => fake()->numberBetween(1, 12),
            'id_matpel' => fake()->numberBetween(1, 15),
            'id_guru' => fake()->numberBetween(1, 10),
            'hari' => fake()->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
            'jam_mulai' => fake()->time('H:i:s', '07:00:00'),
            'jam_selesai' => fake()->time('H:i:s', '16:00:00'),
        ];
    }
}
