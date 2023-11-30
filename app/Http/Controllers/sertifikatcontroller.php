<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sertifikat;
use App\Models\konversi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class sertifikatcontroller extends Controller
{
    public function index(){
        return view('sertifikat.index');
    }
    public function create(){
        $konversi = konversi::all();
        return view('sertifikat.create',compact('konversi'));
    }

    public function store(Request $request)
    {
        // $file = time().'.'.$request->pdf->extension();

        // Storage::putFileAs('public/sertifikat', $request->file('pdf'),$filename);

        // Storage::putFileAs('public/product', $request->file('file'),$file);
        $files = time().'.'.$request->file->extension();
        Storage::putFileAs('public/sertifikat', $request->file('file'),$files);

        $sertifikat = sertifikat::create([
            'mahasiswa_nim' => $request->mahasiswa_nim,
            'file' =>$files

        ]);

        // $fileName = $sertifikat->file->getClientOriginalName();
        // $sertifikat->file->move(public_path('uploads'), $fileName);

        return redirect()->route('mahasiswa.index');
    }

    public function storekonversi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mahasiswa_nim' =>'required',
            'nama_nilai_mbkm' =>'required',
            'nama_nilai_matkul' =>'required',
            'kode_matkul' =>'required',
            'sks' =>'required',
            'jenis_matkul' =>'required',
            'nilai_mbkm' =>'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $konversi = konversi::create([
            'mahasiswa_nim' => $request->mahasiswa_nim,
            'nama_nilai_mbkm' => $request->nama_nilai_mbkm,
            'nama_nilai_matkul' => $request->nama_nilai_matkul,
            'kode_matkul' => $request->kode_matkul,
            'sks' => $request->sks,
            'jenis_matkul' => $request->jenis_matkul,
            'nilai_mbkm' => $request->nilai_mbkm,
        ]);

        return redirect()->route('sertifikat.create');
    }

    public function destroykonversi($id){
        $konversi = konversi::find($id);
        $konversi->delete();

        return redirect()->route('sertifikat.create');
    }
}
