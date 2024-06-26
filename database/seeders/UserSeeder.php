<?php

namespace Database\Seeders;

use App\Models\User;
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

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
        ]);
        $admin->assignRole('admin');
        
        $guru = User::factory()->create([
            'name' => 'Rijal',
            'email' => 'rijal@email.com',
            'password' => Hash::make('password'),
        ]);
        $guru->assignRole('guru');
    }
}
