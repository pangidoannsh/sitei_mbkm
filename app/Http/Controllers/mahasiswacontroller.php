<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mahasiswacontroller extends Controller
{
   public function index(){
    return view ('mahasiswa.index');
   }

   public function create(){
    return view ('mahasiswa.create');
   }
}