<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NilaiPelajaran>
 */
class NilaiPelajaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_siswa' => fake()->numberBetween(1, 20),
            'id_matpel' => fake()->numberBetween(1, 15),
            'uts' => fake()->numberBetween(1, 100),
            'uas' => fake()->numberBetween(1, 100),
            'nilai' => fake()->numberBetween(1, 100),
        ];
    }
}
