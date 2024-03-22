<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // $table->integer('nip')->unique();
        //     $table->string('nama_guru');
        //     $table->string('jenis_kelamin');
        //     $table->string('alamat');
        //     $table->string('no_telepon');
        //     $table->string('email');
        //     $table->string('password');
            'nip' => fake()->creditCardNumber,
            'nama_guru' => fake()->name,
            'jenis_kelamin' => fake()->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => fake()->address,
            'no_telepon' => fake()->phoneNumber,
            'email' => fake()->email,
            'password' => Hash::make('password'),
        ];
    }
}
