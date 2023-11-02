<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserLevel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Admin user
        DB::table('users')->insert([
            'user_id' => 'TSA - Admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'status' => 'Aktif',
            'level' => 'Admin',
            'role' => 'Full',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Member user
        DB::table('users')->insert([
            'user_id' => 'TSA - Member',
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => Hash::make('member123'),
            'status' => 'Aktif',
            'level' => 'Admin',
            'role' => 'Member',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Guest user
        DB::table('users')->insert([
            'user_id' => 'TSA - Guest',
            'name' => 'Guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('guest123'),
            'status' => 'Aktif',
            'level' => 'User',
            'role' => 'Guest',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
