<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\mbkm;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Konsentrasi;
use App\Models\program;
use App\Models\sertifikat;
use App\Models\konversi;


class mahasiswacontroller extends Controller
{
   public function index(){
    $mbkm= mbkm::orderBy("updated_at", "DESC")->get();
    $mbkm = mbkm::where('mahasiswa_nim', Auth::user()->nim)->get();
    return view ('mahasiswa.index',compact('mbkm'));
   }

   public function uploaded(Request $request, $id)
    {
        $km = mbkm::find($id);
        $km->status = 'Usulan konversi nilai';
        $km->updated_at = date('Y-m-d H:i:s');
        $km->update();
        return  back();
    }
}
