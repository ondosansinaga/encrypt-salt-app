<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlipGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\SlipGaji::create([
            'gaji_pokok' => 5000000,
            'id_tunjangan' => 1,
            'tgl_gaji' => '2024-01-30 14:21:11',
        ]);
    }
}