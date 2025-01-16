<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pasien')->insert([
            [
                'nama_panjang' => 'Andi Prasetyo',
                'tanggal_lahir' => '1990-05-15',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567890',
                'email' => 'andi.prasetyo@example.com',
                'pekerjaan' => 'Programmer',
                'alamat' => 'Jl. Merdeka No. 10',
                'nomor_identitas' => '1234567890',
                'id_perawat' => 1,
                'tanggal_pemeriksaan' => '2025-01-16',
                'waktu_pemeriksaan' => '10:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Rina Sari',
                'tanggal_lahir' => '1985-09-20',
                'jenis_kelamin' => 'Perempuan',
                'nomor_hp' => '081234567891',
                'email' => 'rina.sari@example.com',
                'pekerjaan' => 'Dokter',
                'alamat' => 'Jl. Raya No. 5',
                'nomor_identitas' => '2345678901',
                'id_perawat' => 2,
                'tanggal_pemeriksaan' => '2025-01-16',
                'waktu_pemeriksaan' => '11:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Tono Wijaya',
                'tanggal_lahir' => '1980-12-10',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567892',
                'email' => 'tono.wijaya@example.com',
                'pekerjaan' => 'Pengusaha',
                'alamat' => 'Jl. Selatan No. 8',
                'nomor_identitas' => '3456789012',
                'id_perawat' => 3,
                'tanggal_pemeriksaan' => '2025-01-16',
                'waktu_pemeriksaan' => '14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Dewi Anggraeni',
                'tanggal_lahir' => '1995-02-25',
                'jenis_kelamin' => 'Perempuan',
                'nomor_hp' => '081234567893',
                'email' => 'dewi.anggraeni@example.com',
                'pekerjaan' => 'Guru',
                'alamat' => 'Jl. Pahlawan No. 3',
                'nomor_identitas' => '4567890123',
                'id_perawat' => 1,
                'tanggal_pemeriksaan' => '2025-01-17',
                'waktu_pemeriksaan' => '09:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Eko Prabowo',
                'tanggal_lahir' => '1988-06-14',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567894',
                'email' => 'eko.prabowo@example.com',
                'pekerjaan' => 'Manajer',
                'alamat' => 'Jl. Jakarta No. 7',
                'nomor_identitas' => '5678901234',
                'id_perawat' => 2,
                'tanggal_pemeriksaan' => '2025-01-17',
                'waktu_pemeriksaan' => '15:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Siti Nurhaliza',
                'tanggal_lahir' => '1992-11-10',
                'jenis_kelamin' => 'Perempuan',
                'nomor_hp' => '081234567895',
                'email' => 'siti.nurhaliza@example.com',
                'pekerjaan' => 'Apoteker',
                'alamat' => 'Jl. Kebun Raya No. 9',
                'nomor_identitas' => '6789012345',
                'id_perawat' => 3,
                'tanggal_pemeriksaan' => '2025-01-18',
                'waktu_pemeriksaan' => '08:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Rudi Hartono',
                'tanggal_lahir' => '1983-04-21',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567896',
                'email' => 'rudi.hartono@example.com',
                'pekerjaan' => 'Sopir',
                'alamat' => 'Jl. Merdeka No. 12',
                'nomor_identitas' => '7890123456',
                'id_perawat' => 1,
                'tanggal_pemeriksaan' => '2025-01-18',
                'waktu_pemeriksaan' => '13:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Lina Marlina',
                'tanggal_lahir' => '1998-07-05',
                'jenis_kelamin' => 'Perempuan',
                'nomor_hp' => '081234567897',
                'email' => 'lina.marlina@example.com',
                'pekerjaan' => 'Penyanyi',
                'alamat' => 'Jl. Raya Barat No. 11',
                'nomor_identitas' => '8901234567',
                'id_perawat' => 2,
                'tanggal_pemeriksaan' => '2025-01-19',
                'waktu_pemeriksaan' => '10:30:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Budi Santoso',
                'tanggal_lahir' => '1993-01-16',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567898',
                'email' => 'budi.santoso@example.com',
                'pekerjaan' => 'Teknisi',
                'alamat' => 'Jl. Timur No. 4',
                'nomor_identitas' => '9012345678',
                'id_perawat' => 3,
                'tanggal_pemeriksaan' => '2025-01-19',
                'waktu_pemeriksaan' => '11:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Kusuma Wijaya',
                'tanggal_lahir' => '1987-03-22',
                'jenis_kelamin' => 'Laki-laki',
                'nomor_hp' => '081234567899',
                'email' => 'kusuma.wijaya@example.com',
                'pekerjaan' => 'Arsitek',
                'alamat' => 'Jl. Utara No. 2',
                'nomor_identitas' => '0123456789',
                'id_perawat' => 1,
                'tanggal_pemeriksaan' => '2025-01-20',
                'waktu_pemeriksaan' => '14:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_panjang' => 'Wati Suryani',
                'tanggal_lahir' => '1991-10-18',
                'jenis_kelamin' => 'Perempuan',
                'nomor_hp' => '081234567900',
                'email' => 'wati.suryani@example.com',
                'pekerjaan' => 'Perancang Busana',
                'alamat' => 'Jl. Pantai No. 6',
                'nomor_identitas' => '1234567899',
                'id_perawat' => 2,
                'tanggal_pemeriksaan' => '2025-01-20',
                'waktu_pemeriksaan' => '16:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}