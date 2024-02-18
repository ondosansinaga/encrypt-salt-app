<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TunjanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Tunjangan::create([
            'nama_tunjangan' => 'Tunjangan Perjalanan',
        ]);

        \App\Models\Tunjangan::create([
            'nama_tunjangan' => 'Tunjangan Anak',
        ]);

        \App\Models\Tunjangan::create([
            'nama_tunjangan' => 'Tunjangan Pajak',
        ]);

        \App\Models\Tunjangan::create([
            'nama_tunjangan' => 'Tunjangan Lainnya',
        ]);
    }
}