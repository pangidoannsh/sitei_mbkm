<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mbkm;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Konsentrasi;
use App\Models\program;

class prodicontroller extends Controller
{
    public function index(){
        $mbkm = mbkm::all();
        return view('prodi.index', compact('mbkm'));
    }

    // value enum = 'Usulan','Ditolak','Usulan disetujui','Usulan konversi nilai','Konversi diterima','Konversi ditolak','Nilai sudah keluar'
    public function approveusulan(Request $request, $id)
    {
        $km = mbkm::find($id);
        $km->status = 'Usulan Disetujui';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return  back();
    }

    public function tolakusulan(Request $request, $id)
    {
        // $request->validate([
        // 'alasan' => 'required',
        // ]);
        $km = mbkm::find($id);
        $km->status = 'Ditolak';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return  back();
    }

    public function approvekonversi(Request $request, $id)
    {
        $km = mbkm::find($id);
        $km->status = 'Konversi diterima';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return  back();
    }

    public function tolakkonversi(Request $request, $id)
        {
            // $request->validate([
            // 'alasan' => 'required',
            // ]);
            $km = mbkm::find($id);
            $km->status = 'Konversi ditolak';
            $km->updated_at = date('Y-m-d H:i:s');
            $km->update();
            return  back();
        }

    public function riwayat(){
        $mbkm = mbkm::all();
        return view('prodi.riwayat', compact('mbkm'));
    }
}
