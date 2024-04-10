<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Mbkm;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Konsentrasi;
use App\Models\Program;
use App\Models\Sertifikat;
use App\Models\Konversi;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Hash;

class mahasiswacontroller extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        $konsentrasi = konsentrasi::all();
        $program = Program::all();
        $mbkm = Mbkm::where('mahasiswa_nim', Auth::guard("mahasiswa")->user()->nim)
            ->where(function ($query) {
                $query->where("status", "!=", "Ditolak")
                    ->where("status", "!=", "Nilai sudah keluar");
            })
            ->orderBy("updated_at", "DESC")->get();
        // $mbkm = mbkm::orderBy("updated_at", "DESC")->get();
        return view('mahasiswa.index', compact('mbkm', 'prodi', 'konsentrasi', 'program'));
    }
    public function riwayat()
    {
        $mbkm = Mbkm::where('mahasiswa_nim', Auth::guard("mahasiswa")->user()->nim)
            ->where(function ($query) {
                $query->where("status", "Ditolak")
                    ->orWhere("status", "Nilai sudah keluar");
            })
            ->orderBy("created_at", "DESC")->get();
        return view('mahasiswa.riwayat', compact('mbkm'));
    }


    public function detail($id)
    {
        $mbkm = Mbkm::where('id', $id)->first();
        $konversi = Konversi::where("mbkm_id", $mbkm->id)->get();
        $sertifikat = Sertifikat::where("mbkm_id", $mbkm->id)->first();
        return view('mahasiswa.detail', compact('mbkm', 'konversi', 'sertifikat'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'program_id' => 'required',
            'periode_mbkm' => 'required',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'bidang_usaha' => 'required',
            'judul' => 'required',
            'rincian' => 'required',
            'mulai_kegiatan' => 'required',
            'selesai_kegiatan' => 'required',
            'batas' => 'required',
        ]);
        $mahasiswa = Auth::guard("mahasiswa")->user();
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $rincian = $request->file('rincian');

        $mbkm = Mbkm::create([
            'mahasiswa_nim' => $mahasiswa->nim,
            'program_id' => $request->program_id,
            'periode_mbkm' => $request->periode_mbkm,
            'prodi_id' => $request->prodi_id,
            'konsentrasi_id' => $request->konsentrasi_id,
            'perusahaan' => $request->perusahaan,
            'alamat' => $request->alamat,
            'bidang_usaha' => $request->bidang_usaha,
            'judul' => $request->judul,
            'mulai_kegiatan' => $request->mulai_kegiatan,
            'selesai_kegiatan' => $request->selesai_kegiatan,
            'rincian' => str_replace('public/', '', $rincian->store('public/mbkm')),
            'batas' => $request->batas,

        ]);
        return redirect()->route('mbkm');
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
        $km = Mbkm::findOrFail($id);
        $km->status = 'Usulan konversi nilai';
        $km->update();
        return  back();
    }

    public function destroy($id)
    {
        $data = Mbkm::findOrFail($id);
        Storage::delete("public/" . $data->rincian);
        $data->delete();
        return back();
    }
}
