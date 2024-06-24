<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Thomas N',
            'email' => 'thomas.n@compfest.id',
            'phone_number' => '08123456789',
            'password' => Hash::make('Admin123'),
            'role' => 'admin',
        ]);
    }
}
