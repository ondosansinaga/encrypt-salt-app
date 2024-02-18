<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\Traits\UploadFile;


class PerizinanController extends Controller
{
    use UploadFile;
    //
    public function index($id)
    {
        $data = Perizinan::join('karyawan', 'perizinan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->join('admin', 'perizinan.id_admin', '=', 'admin.id_admin')
            ->select('perizinan.*', 'karyawan.nama_karyawan', 'admin.nama_admin')
            ->where('karyawan.id_karyawan', $id)
            ->get();

        if (!$data) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Data perizinan tidak ditemukan',
                ]
            );
        }

        return response()->json(
            [
                'status' => 'success',
                'message' => 'Data perizinan berhasil diambil',
                'data' => $data
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'id_admin' => 'required',
            'perihal' => 'required',
            'bukti' => 'required|mimes:pdf'
        ]);

        $data = Perizinan::create($request->all());

        if ($request->hasFile('bukti')) {
            $file = $this->uploadFile($request->file('bukti'), 'bukti');
            $data->bukti = $file;
            $data->save();
        }

        if (!$data) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Data perizinan gagal disimpan',
                ]
            );
        }


        return response()->json(
            [
                'status' => 'success',
                'message' => 'Data perizinan berhasil disimpan',
                'data' => $data
            ]
        );
    }
}