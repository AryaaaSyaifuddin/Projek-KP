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
            // Perawat data
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

            // Dokter data
            [
                'nama' => 'Dr. Andi Kusuma',
                'role' => 'dokter',
                'username' => 'andi.kusuma',
                'password' => Hash::make('dokter123'),
                'email' => 'andi.kusuma@example.com',
                'no_hp' => '081234567895',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dr. Siti Nurhaliza',
                'role' => 'dokter',
                'username' => 'siti.nurhaliza',
                'password' => Hash::make('dokter123'),
                'email' => 'siti.nurhaliza@example.com',
                'no_hp' => '081234567896',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dr. Fahmi Wijaya',
                'role' => 'dokter',
                'username' => 'fahmi.wijaya',
                'password' => Hash::make('dokter123'),
                'email' => 'fahmi.wijaya@example.com',
                'no_hp' => '081234567897',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dr. Rina Handayani',
                'role' => 'dokter',
                'username' => 'rina.handayani',
                'password' => Hash::make('dokter123'),
                'email' => 'rina.handayani@example.com',
                'no_hp' => '081234567898',
                'status' => 'sudah diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dr. Wahyu Saputra',
                'role' => 'dokter',
                'username' => 'wahyu.saputra',
                'password' => Hash::make('dokter123'),
                'email' => 'wahyu.saputra@example.com',
                'no_hp' => '081234567899',
                'status' => 'belum diverifikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
