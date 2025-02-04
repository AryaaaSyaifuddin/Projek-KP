<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusPemeriksaan;

class StatusPemeriksaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data id_hasil_pemeriksaan dari 2 sampai 5
        for ($i = 2; $i <= 5; $i++) {
            StatusPemeriksaan::create([
                'id_hasil_pemeriksaan' => $i,
                'status' => 'Menunggu Persetujuan'
            ]);
        }
    }
}
