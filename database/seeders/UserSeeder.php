<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@user.com',
                'password' => Hash::make('password'),
                'no_hp' => '1234567890',
                'saldo' => '1000.00',
                'id_role' => 1,
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'no_hp' => '0987654321',
                'saldo' => '500.00',
                'id_role' => 2,
            ],
        ]);
    }
}