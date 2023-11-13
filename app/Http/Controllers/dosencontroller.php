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
}
