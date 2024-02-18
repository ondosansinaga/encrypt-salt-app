<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Jabatan::create([
            'nama_jabatan' => 'Kepala Dinas',
        ]);

        \App\Models\Jabatan::create([
            'nama_jabatan' => 'Sekretaris',
        ]);

        \App\Models\Jabatan::create([
            'nama_jabatan' => 'UPTD',
        ]);
    }
}