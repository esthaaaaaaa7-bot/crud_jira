<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Administrator ProSite',
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name'     => 'Budi Santoso',
            'username' => 'budi',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name'     => 'Siti Rahma',
            'username' => 'siti',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name'     => 'Rudi Hermawan',
            'username' => 'rudi',
            'password' => Hash::make('password'),
        ]);
    }
}