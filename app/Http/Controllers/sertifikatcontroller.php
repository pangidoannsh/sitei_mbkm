<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sertifikat;
use App\Models\Konversi;
use App\Models\Mbkm\MataKuliah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class sertifikatcontroller extends Controller
{
    public function index()
    {
        return view('sertifikat.index');
    }
    public function create($id)
    {
        $matkul = MataKuliah::all();
        $mahasiswa = Auth::guard("mahasiswa")->user();
        $konversi = Konversi::where("mbkm_id", $id)->get();
        $sertifikat = Sertifikat::where("mbkm_id", $id)->first();
        $mbkmId = $id;
        return view('sertifikat.create', compact('konversi', 'mbkmId', 'sertifikat', 'matkul'));
    }

    public function store(Request $request)
    {
        $files = time() . '.' . $request->file->extension();
        Storage::putFileAs('public/sertifikat', $request->file('file'), $files);
        $mahasiswa = Auth::guard("mahasiswa")->user();
        $sertifikat = sertifikat::create([
            'mahasiswa_nim' => $mahasiswa->nim,
            'mbkm_id' => $request->mbkm_id,
            'file' => $files

        ]);

        return redirect()->route('mbkm');
    }

    public function storekonversi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mbkm_id' => 'required',
            'matkul' => 'required',
            'nama_nilai_mbkm' => 'required',
            'nilai_mbkm' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $matkul = MataKuliah::findOrFail($request->matkul);

        Konversi::create([
            'mbkm_id' => $request->mbkm_id,
            'nama_nilai_mbkm' => $request->nama_nilai_mbkm,
            'nama_nilai_matkul' => $matkul->mk,
            'kode_matkul' => $matkul->kode_mk,
            'sks' => $matkul->sks,
            'jenis_matkul' => $matkul->jenis,
            'nilai_mbkm' => $request->nilai_mbkm,
        ]);

        return back();
    }

    public function destroykonversi($id)
    {
        $konversi = Konversi::findOrFail($id);
        $konversi->delete();

        return back();
    }
}
