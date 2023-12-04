<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

#yangilash

class UserSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'name' => 'Manager',
            'role_id' => 1,
            'email' => 'manage@campany.com',
            'password' => Hash::make('secret'),
        ]);

        User::create([
            'name' => 'Example Client',
            'role_id' => 2,
            'email' => 'client@campany.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
