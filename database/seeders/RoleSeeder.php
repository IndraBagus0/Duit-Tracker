<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->insert([
            ['nama_role' => 'admin'],
            ['nama_role' => 'user'],
            ['nama_role' => 'premium'],
            ['nama_role' => 'upgrade'],
        ]);
    }
}
