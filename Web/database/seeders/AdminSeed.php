<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'admin_name' => 'Admin',
                'admin_email' => 'admin@admin.com',
                'admin_password' => '1234',
            ],
        ];

        foreach ($users as $user) {
            DB::table('admins')->insert([
                'admin_name' => $user['admin_name'],
                'admin_email' => $user['admin_email'],
                'admin_password' => $user['admin_password'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
