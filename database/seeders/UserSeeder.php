<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('tbl_users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'phoneNumber' => '1234567890',
                'accountBalance' => '1000.00',
                'roleId' => 1,
            ],
            [
                'name' => 'Regular User',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('password'),
                'phoneNumber' => '0987654321',
                'accountBalance' => '500.00',
                'roleId' => 2,
            ],
            [
                'name' => 'Premium User',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('password'),
                'phoneNumber' => '0987654321',
                'accountBalance' => '0',
                'roleId' => 3,
            ],
        ]);
    }
}
