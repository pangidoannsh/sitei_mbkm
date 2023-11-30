<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Role;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class dosencontroller extends Controller
{
    public function index(){
        $dosen=dosen::all();

        return view('dosen.index',compact('dosen'));
    }

    public function create(){
        $role=role::all();
        $prodi=prodi::all();
        return view('dosen.create', compact('role','prodi'));
    }

    public function store(Request $request)
    {

        $dosen = dosen::create([
            'nama' => $request->nama,
            'nama_singkat' => $request->nama_singkat,
            'email' => $request->email,
            'nip' => $request->nip,
            'role_id' => $request->role_id,
            'prodi_id' => $request->prodi_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dosen.index');
    }

    public function editpswdsn(Dosen $dosen)
    {
        return view('dosen.profil-editpsw', [
            'dosen' => $dosen,
        ]);
    }

    public function updatepswdsn()
    {
        request()->validate([
            'password_lama' => ['required'],
            'password' => ['required', 'min:5', 'max:255', 'confirmed'],
        ]);

        $current_password = auth()->user()->password;
        $old_password = request('password_lama');
        $dosen_id = auth()->user()->id;

        if (Hash::check($old_password, $current_password)) {

            $dosen = Dosen::find($dosen_id);

            $dosen->password = Hash::make(request('password'));

            if ($dosen->save()) {
                return redirect('/prodi')->with('message', 'Password Berhasil Diedit!');
            } else {
                return back()->with('message', 'Password Salah!');
            }
        } else {
            return back()->with('message', 'Password Salah!');
        }
    }
}
