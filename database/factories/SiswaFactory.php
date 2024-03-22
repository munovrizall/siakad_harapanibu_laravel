<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => fake()->creditCardNumber,
            'nama_siswa' => fake()->name,
            'id_kelas' => fake()->numberBetween(1,12),
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => fake()->address,
            'no_telepon' => fake()->phoneNumber,
            'email' => fake()->safeEmail,
            'password' => Hash::make('password'),
        ];
    }
}
