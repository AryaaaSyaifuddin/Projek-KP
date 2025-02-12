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

        for ($id = 35; $id <= 39; $id++) {
            StatusPemeriksaan::create([
                'id_hasil_pemeriksaan' => $id,
                'status'               => 'Menunggu Persetujuan'
            ]);
        }

    }
}
