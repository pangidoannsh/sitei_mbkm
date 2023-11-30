<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    $prodi = prodi::all();
    $konsentrasi = konsentrasi::all();
    $program = program::all();
    $mbkm = mbkm::where('mahasiswa_nim', Auth::user()->nim)->get();
    $mbkm= mbkm::orderBy("updated_at", "DESC")->get();
    return view ('mahasiswa.index',compact('mbkm','prodi','konsentrasi','program'));
   }

   public function detail($id){
    $mbkm= mbkm::where('id', $id)->get();
    $konversi= konversi::all();
    $sertifikat= sertifikat::all();
    // $konversi = konversi::where('mahasiswa_nim', Auth::user()->nim)->get();
    return view('mahasiswa.detail', compact('mbkm', 'konversi','sertifikat'));
        // 'mbkm' => mbkm::where('id', $id)->where('prodi_id', '3')->get(),
    }

   public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            // 'mahasiswa_nim' =>'required',
            // 'prodi_id' =>'required',
            // 'konsentrasi_id' =>'required',
            'program_id' =>'required',
            'periode_mbkm' =>'required',
            'perusahaan' =>'required',
            'alamat' =>'required',
            'bidang_usaha' =>'required',
            'judul' =>'required',
            'rincian' =>'required',
            'priode_kegiatan' =>'required',
            'batas' =>'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $rincian = time().'.'.$request->rincian->extension();
        Storage::putFileAs('public/file', $request->file('rincian'),$rincian);

        $mbkm = mbkm::create([
            'mahasiswa_nim' => $request->mahasiswa_nim,
            'program_id' => $request->program_id,
            'periode_mbkm' => $request->periode_mbkm,
            'prodi_id' => $request->prodi_id,
            'konsentrasi_id' => $request->konsentrasi_id,
            'perusahaan' => $request->perusahaan,
            'alamat' => $request->alamat,
            'bidang_usaha' => $request->bidang_usaha,
            'judul' => $request->judul,
            'rincian' =>$rincian,
            'priode_kegiatan' => $request->priode_kegiatan,
            'batas' => $request->batas,

        ]);

        // $fileName = $sertifikat->file->getClientOriginalName();
        // $sertifikat->file->move(public_path('uploads'), $fileName);

        return redirect()->route('mahasiswa.index');
    }

    public function editpswmhs(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.profil-editpsw', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function updatepswmhs()
    {
        request()->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed'],
        ]);

        $current_password = auth()->user()->password;
        $old_password = request('password_lama');
        $mahasiswa_id = auth()->user()->id;

        if (Hash::check($old_password, $current_password)) {

            $mahasiswa = Mahasiswa::find($mahasiswa_id);

            $mahasiswa->password = Hash::make(request('password'));

            if ($mahasiswa->save()) {
                return redirect('/mahasiswa')->with('message', 'Password Berhasil Diedit!');
            } else {
                return back()->with('message', 'Password Salah!');
            }
        } else {
            return back()->with('message', 'Password Salah!');
        }
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
