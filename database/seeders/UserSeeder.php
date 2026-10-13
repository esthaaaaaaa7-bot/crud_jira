<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $superadminRole = Role::where('name', 'superadmin')->first();
        $userRole = Role::where('name', 'user')->first();

        User::create([
            'name'     => 'Administrator ProSite',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role_id'  => $superadminRole->id,
        ]);

        User::create([
            'name'     => 'Budi Santoso',
            'username' => 'budi',
            'password' => Hash::make('password'),
            'role_id'  => $userRole->id,
        ]);

        User::create([
            'name'     => 'Siti Rahma',
            'username' => 'siti',
            'password' => Hash::make('password'),
            'role_id'  => $userRole->id,
        ]);

        User::create([
            'name'     => 'Rudi Hermawan',
            'username' => 'rudi',
            'password' => Hash::make('password'),
            'role_id'  => $userRole->id,
        ]);
    }
}