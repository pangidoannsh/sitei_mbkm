<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\mbkm;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Konsentrasi;
use App\Models\program;
use App\Models\sertifikat;
use App\Models\konversi;



class detailcontroller extends Controller
{

    public function index(){
        $mbkm= mbkm::all();
        return view('mahasiswa.index',compact('mbkm'));
    }
    public function detail($id){
        $mbkm= mbkm::where('id', $id)->get();
        $konversi= konversi::all();
        // $konversi = konversi::where('mahasiswa_nim', Auth::user()->nim)->get();
        return view('mahasiswa.detail', compact('mbkm', 'konversi'));
            // 'mbkm' => mbkm::where('id', $id)->where('prodi_id', '3')->get(),
    }

}
