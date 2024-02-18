<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Karyawan::create([
            'nama_karyawan' => 'Eko',
            'id_jabatan' => 1,
            'id_slip_gaji' => 1,
            'nik' => '1234567890',
            'password' => bcrypt('karyawan'),
            'salt' => 'karyawan',
            'alamat' => 'Jl. Karyawan No. 1',
            'ktp' => '1234567890',
            'kk' => '1234567890',
            'no_telpon' => '081234567890',
            'nip' => '1234567890',
        ]);
    }
}