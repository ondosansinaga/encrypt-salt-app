<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $data = \App\Models\Karyawan::join('jabatan', 'karyawan.id_jabatan', '=', 'jabatan.id_jabatan')
            ->select('karyawan.nama_karyawan', 'jabatan.nama_jabatan', 'karyawan.id_karyawan', 'karyawan.nik', 'karyawan.created_at')
            ->get();

        $jabatan = \App\Models\Jabatan::all();

        return view('admin.dashboard', compact('data', 'jabatan'));
    }
    public function karyawan()
    {
        return view('admin.karyawan');
    }
    public function gaji()
    {
        return view('admin.karyawan');
    }
    public function tunjangan()
    {
        return view('admin.tunjangan');
    }
    public function jabatan()
    {
        return view('admin.jabatan');
    }
}