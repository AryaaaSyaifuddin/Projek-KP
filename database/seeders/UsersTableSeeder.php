<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Ayu Lestari',
                'role' => 'perawat',
                'username' => 'ayu.lestari',
                'password' => Hash::make('password123'),
                'email' => 'ayu.lestari@example.com',
                'no_hp' => '081234567890',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'role' => 'perawat',
                'username' => 'budi.santoso',
                'password' => Hash::make('password123'),
                'email' => 'budi.santoso@example.com',
                'no_hp' => '081234567891',
                'status' => 'belum diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra Dewi',
                'role' => 'perawat',
                'username' => 'citra.dewi',
                'password' => Hash::make('password123'),
                'email' => 'citra.dewi@example.com',
                'no_hp' => '081234567892',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Admin data
            [
                'nama' => 'Rudi Prasetyo',
                'role' => 'admin',
                'username' => 'rudi.prasetyo',
                'password' => Hash::make('admin123'),
                'email' => 'rudi.prasetyo@example.com',
                'no_hp' => '081234567893',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Indah Sari',
                'role' => 'admin',
                'username' => 'indah.sari',
                'password' => Hash::make('admin123'),
                'email' => 'indah.sari@example.com',
                'no_hp' => '081234567894',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
