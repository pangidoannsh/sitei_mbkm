<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prodicontroller extends Controller
{
    public function index(){
        return view('prodi.index');
    }
    public function sertifikat(){
        return view('prodi.sertifikat');
    }
    public function konversi(){
        return view('prodi.konversi');
    }
    public function riwayat(){
        return view('prodi.riwayat');
    }
}
