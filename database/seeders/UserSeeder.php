<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
            'roles' => 'ADMIN'
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Rijal',
            'email' => 'rijal@email.com',
            'password' => Hash::make('password'),
            'roles' => 'SISWA'
        ]);
    }
}
